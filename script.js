/**
 * @file       clock/script.js
 * @brief      Javascript for the Clock Plugin
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Luis Machuca Bezzaza <luis.machuca [at] gulix.cl>
 * @version    3.0
 * @date       2025-02-07
 * @link       http://www.dokuwiki.org/plugin:clock
 */

// id of the clock face.
// DONT CHANGE THIS UNLESS YOU KNOW WHAT YOU ARE DOING!
const WRAP_ID = 'clock_wrapper';
const DRAW_ID = 'dw_clock_object';

const CLOCK_DATE = 'clock_date';
const CLOCK_TIME = 'clock_time';

const DOKU_PLUGIN = DOKU_BASE + 'lib/plugins/clock';

// timer object
let dwClockTimer;

class dwClock {
    constructor() {
        this.m_time = new Date();
        this.m_days = [
            'sunday',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
        ];

        this.m_eDate = document.querySelector(`#${WRAP_ID} .${CLOCK_DATE}`);
        this.m_eTime = document.querySelector(`#${WRAP_ID} .${CLOCK_TIME}`);
        this.m_eConf = document.querySelector(`#${WRAP_ID} .varidates`);

        this.init();
    }

    // accesser
    get time() { return this.m_time; }

    year() { return this.m_time.getFullYear(); }
    month() { return this.m_time.getMonth() + 1; }
    date() { return this.m_time.getDate(); }
    day() { return this.m_days[this.m_time.getDay()]; }

    hours() { return this.m_time.getHours(); }
    minutes() { return this.m_time.getMinutes(); }
    seconds() { return this.m_time.getSeconds(); }
    milliseconds() { return this.m_time.getMilliseconds(); }

    // functions
    init() {
      this.display_date();
      this.display_time();
    }
    update() {
        this.tick();

        this.display_date();
        this.display_time();
    }

    display_date() {
        // format it as ISO 8601 text
        let fmt = this.m_eConf.getAttribute('fmt_date').toUpperCase();
        fmt = fmt.replace('%Y', this.year().toString());
        fmt = fmt.replace('%M', this.month().toString().padStart(2, '0'));
        fmt = fmt.replace('%D', this.date().toString().padStart(2, '0'));
        fmt = fmt.replace('%W', LANG.plugins.clock[this.day()]);

        // assign text to element with class as 'clock_date' variable
        this.m_eDate.innerHTML = ` ${fmt} `;
    }
    display_time() { }

    tick() {
        this.m_time = new Date();
    }
    format(fmt) {
        return this.m_time.toLocaleString(fmt);
    }
    formatArgs(fmt, args) {
        return this.m_time.toLocaleString(fmt, args);
    }
};

jQuery(() => {
    if (JSINFO['ACT'] !== 'show') { return; }

    // 'dwClock' inherited class
    class dwClock_Analog extends dwClock {
        init() {
            this.m_eTime.innerHTML = '';
            this.create_dials();
            this.create_hands();

            super.init();
        }

        create_dials() {
            const dials = document.createElement('div');
            for (var i = 1; i <= 12; i++) {
                const elem = document.createElement('div');
                elem.classList.add(i);
                elem.style.transform = `rotate(${i * 30}deg)`;

                dials.appendChild(elem);
            }
            this.m_eTime.appendChild(dials);
        }
        create_hands() {
            const second = document.createElement('div');
            const minute = document.createElement('div');
            const hour   = document.createElement('div');

            second.className = '.hand.second';
            minute.className = '.hand.minute';
            hour.className   = '.hand.hour';

            this.m_eTime.appendChild(second);
            this.m_eTime.appendChild(minute);
            this.m_eTime.appendChild(hour);
        }

        display_time() {
            const second = this.m_eTime.querySelector('.hand.second');
            const minute = this.m_eTime.querySelector('.hand.minute');
            const hour   = this.m_eTime.querySelector('.hand.hour');

            this.m_eTime.style.height = `${this.m_eTime.scrollWidth * 0.75}px`;

            const ss = (360 / 60) * this.seconds();
            const mm = (360 / 60) * this.minutes() + (ss / 60);
            const HH = (360 / 12) * this.hours() + (mm / 12);

            second.style.transform = `rotate(${ss}deg)`;
            minute.style.transform = `rotate(${mm}deg)`;
            hour.style.transform   = `rotate(${HH}deg)`;
        }
    }
    class dwClock_Digital extends dwClock {
        display_time() {
            // format it as ISO 8601 text
            let fmt = this.m_eConf.getAttribute('fmt_time').toLowerCase();
            fmt = fmt.replace('%f', this.milliseconds().toString().padStart(2, '0'));
            fmt = fmt.replace('%s', this.seconds().toString().padStart(2, '0'));
            fmt = fmt.replace('%m', this.minutes().toString().padStart(2, '0'));
            fmt = fmt.replace('%h', this.hours().toString().padStart(2, '0'));

            // assign text to element
            this.m_eTime.innerHTML = ` ${fmt} `;
        }
    }

    // analog or digital
    dwClockTimer = new dwClock();
    const elem = document.querySelector(`#${WRAP_ID} .${CLOCK_TIME}`);
    if (elem.className.includes('analog')) {
        dwClockTimer = new dwClock_Analog();
    }
    if (elem.className.includes('digital')) {
        dwClockTimer = new dwClock_Digital();
    }
    
    // ticks the clock
    setInterval(() => { dwClockTimer.update(); }, 1000);
});

// end of clock/script.js