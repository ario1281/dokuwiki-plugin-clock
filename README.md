# dokuwiki-plugin-clock
**clock Plugin**は、Dokuwikiページに時間を視覚的に表示する機能を提供する。`CSS`と`JavaScript`を使用し、ブラウザに現在時間が表示される。
このプラグインは、arcticのようなサイドバー対応のテンプレートと組み合わせると特に便利です。

## Download and Installation
拡張マネージャーを使用してプラグインを検索し、インストールしてください。  
手動でプラグインをインストるする場合は"プラグイン"を参照してください。

## Usage
下記を<ins>単独で記述してください</ins>。

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

- `clock_type`：表示される時計の種類を設定します。
  - `digital`
  - `analog`
  - `binary`
- `clock_style`：クラス名に対応するCSSで時計を装飾を装飾を行います。<br>スタイルの例については`Styles`を参照。
- `clock_is_date`：日付の有効／無効を設定します。
- `clock_fmt_date`：日付フォーマットを指定します。
- `clock_fmt_time`：時間フォーマットを指定します。
- `clock_is_helpbar`：ヘルプバーの有効／無効を設定します。
- `clock_infopage`：指定された「wikiページ」へのリンクがヘルプバーに表示されます。
- `nojs_fallback`：JavaScriptが無効の場合、どのように処理するかを設定します。
