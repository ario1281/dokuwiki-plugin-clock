# dokuwiki-plugin-clock
**clock Plugin**は、Dokuwikiページに時間を視覚的に表示する機能を提供する。`CSS`と`JavaScript`を使用し、ブラウザに現在時間が表示される。
このプラグインは、arcticのようなサイドバー対応のテンプレートと組み合わせると特に便利です。

## Download and Installation
拡張マネージャーを使用してプラグインを検索し、インストールしてください。

手動でプラグインをインストるする場合は"プラグイン"を参照してください。

## Utage
下記を記述してください。

```
{{clock}}
```

### Demo

#### Styles
<table>
  <tr>
    <td></td>
    <td>plain</td>
  </tr>
  <tr>
    <td></td>
    <td>neon</td>
  </tr>
  <tr>
    <td></td>
    <td>aradio</td>
  </tr>
  <tr>
    <td></td>
    <td>tv24</td>
  </tr>
  <tr>
    <td></td>
    <td>bluebox</td>
  </tr>
</table>

#### Sneak Peek
<table>
  <tr>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td> Digital Clock </td>
    <td> Analog Clock </td>
    <td> Binary Clock </td>
  </tr>
</table>

### Configuration
プラグインは設定マネージャー経由で設定されます。
以下、オプションの簡単な説明です。

- `clock_type`：使用する時計の種類を設定します。
  - `digital`
  - `analog`
  - `binary`
- `clock_style`：プラグインのスタイル設定に使用されるクラス名を設定します。詳しくはStylesを確認してください。
- `clock_is_date`：
- `clock_fmt_date`：
- `clock_fmt_time`：
- `clock_is_helpbar`：
- `clock_infopage`：
- `nojs_fallback`：
