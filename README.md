# dokuwiki-plugin-clock
**clock Plugin**は、Dokuwikiページに[時間を視覚的に表示する機能](https://en.wikipedia.org/wiki/Clock)を提供する。`CSS`と`JavaScript`を使用し、ブラウザに現在時間が表示される。
このプラグインは、[Arctic](https://www.dokuwiki.org/template:arctic)のようなサイドバー対応のテンプレートと組み合わせると特に便利です。

## ダウンロードとインストール
[Extension Manager](https://www.dokuwiki.org/plugin:extension)を使用してプラグインを検索し、インストールしてください。  
手動でプラグインをインストるする場合は[Plugins](https://www.dokuwiki.org/plugins)を参照してください。

## 使い方
下記を<ins>単独で記述してください</ins>。  
```
{{clock}}
```

詳細：
- プラグインの構文はParamを必要としません。
- 設定は**設定マネージャー**経由で利用可能です。

#### 種類
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

#### スタイル
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

## 設定構成
プラグインは設定マネージャー経由で設定されます。
以下、オプションの簡単な説明です。

- `clock_type`       ：表示される時計の種類を設定します。[種類](#種類)を参照。
  - `digital`        ：デジタル時計
  - `analog`         ：アナログ時計
  - `binary`         ：バイナリ時計
- `clock_style`      ：クラス名に対応するCSSで時計の装飾を行います。[スタイル](#スタイル)を参照。
- `clock_is_date`    ：日付の有効／無効を設定します。
- `clock_fmt_date`   ：日付フォーマットを指定します。
- `clock_fmt_time`   ：時間フォーマットを指定します。
- `clock_is_helpbar` ：ヘルプバーの有効／無効を設定します。
- `clock_infopage`   ：指定された「wikiページ」へのリンクがヘルプバーに表示されます。
- `nojs_fallback`    ：JavaScriptが無効の場合、どのように処理するかを設定します。

## その他詳細
### ヘルプバー
このプラグインのversionでは、プラグイン設定オプションで選択されたリンクを表示するヘルプバーが実装されています。
その変数が空欄の場合、[このページリンク](https://www.dokuwiki.org/plugin:clock)が表示されます。  
ヘルプバーを削除したい場合、設定マネージャー経由で無効化してください。

### カスタマイズ
`aradio`と`tv24`スタイルは、CSS3フォントサポートだけでなく、クライアント側で該当フォントがインストール済み、アクセス可能である必要があります。
フォントは、プラグインをデフォルトでインストールする際のライセンス、ネットワーク、プライバシーに関する問題を回避するため、直接提供しません。

独自の時計スタイルを作成するには、デフォルトスタイルを選択し、`$DOKU_CONF/userstyle.css `にコピーして、必要に応じて修正してください。
クラス名を変更して、そのスタイルを構成マネージャーから使用するスタイルとして設定できます。

