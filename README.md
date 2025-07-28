# dokuwiki-plugin-clock
**clock Plugin**は、Dokuwikiページに[時間を視覚的に表示する機能](https://en.wikipedia.org/wiki/Clock)を提供する。`CSS`と`JavaScript`を使用し、ブラウザに現在時間が表示される。
このプラグインは、[Arctic](https://www.dokuwiki.org/template:arctic)のようなサイドバー対応のテンプレートと組み合わせると特に便利です。

## Download and Installation
[Extension Manager](https://www.dokuwiki.org/plugin:extension)を使用してプラグインを検索し、インストールしてください。  
手動でプラグインをインストるする場合は[Plugins](https://www.dokuwiki.org/plugins)を参照してください。

## Usage
下記を<ins>単独で記述してください</ins>。

```
{{clock}}
```

### Demo

#### Types
<table>
  <tr>
    <td><img alt='digital' src='' /></td>
    <td><img alt='analog' src='' /></td>
    <td><img alt='binary' src='' /></td>
  </tr>
  <tr>
    <td> Digital Clock </td>
    <td> Analog Clock </td>
    <td> Binary Clock </td>
  </tr>
</table>

#### Styles
<table>
  <tr>
    <th> Image </th>
    <th> Param </th>
  </tr>
  <tr>
    <td><img alt='plain' src='' /></td>
    <td>plain</td>
  </tr>
  <tr>
    <td><img alt='neon' src='' /></td>
    <td>neon</td>
  </tr>
  <tr>
    <td><img alt='aradio' src='' /></td>
    <td>aradio</td>
  </tr>
  <tr>
    <td><img alt='tv24' src='' /></td>
    <td>tv24</td>
  </tr>
  <tr>
    <td><img alt='bluebox' src='' /></td>
    <td>bluebox</td>
  </tr>
</table>
and more...

### Configuration
プラグインは設定マネージャー経由で設定されます。
以下、オプションの簡単な説明です。

- `clock_type`       ：表示される時計の種類を設定します。[Types](#types)を参照。
  - `digital`        ：デジタル時計
  - `analog`         ：アナログ時計
  - `binary`         ：バイナリ時計
- `clock_style`      ：クラス名に対応するCSSで時計を装飾を装飾を行います。[Styles](#styles)を参照。
- `clock_is_date`    ：日付の有効／無効を設定します。
- `clock_fmt_date`   ：日付フォーマットを指定します。
- `clock_fmt_time`   ：時間フォーマットを指定します。
- `clock_is_helpbar` ：ヘルプバーの有効／無効を設定します。
- `clock_infopage`   ：指定された「wikiページ」へのリンクがヘルプバーに表示されます。
- `nojs_fallback`    ：JavaScriptが無効の場合、どのように処理するかを設定します。
