CHAP - ConoHa API for PHP
===

CHAP は ConoHa API のために作られた PHP 用ライブラリです。  
API へ PHP から簡単に接続したいのであれば、このライブラリは最も適した方法です。 


## Description

ConoHa API は OpenStack API を元に作られていますが、同じではありません。  
OpenStack にて提供されていない機能を利用する場合、自分で API への接続を処理する必要があります。

このライブラリは ConoHa API を利用するために作成されており、全ての API の機能へアクセスすることが可能です。  
ConoHa と CHAP で最高の VPS 生活を構築しましょう！

## Getting Started

### 必要要件
- PHP >= 5.6
- cURL extension for PHP

### 前準備
まず、 CHAP を利用するために ConoHa API のアカウントを所持している必要があります。  
CHAP では API の ユーザーネーム、パスワード、そしてテナントID が必要です。  
(まだアカウントを持っていませんか？ [ConoHa のページ](https://www.conoha.jp/)から作成してください！)

### インストール
CHAP では composer を利用します。  
インストールするディレクトリにて、下のコマンドを実行して下さい。

```
# Composer のインストール
curl -sS https://getcomposer.org/installer | php

# CHAP とその依存関係の導入
php composer.phar require keika299/chap
```

たったこれだけです！

### 使用方法
例えば、下のコードをあなたの PHP ファイルに追加する事で、支払い履歴のリストを取得することができます。


```
<?php
//CHAP は composer のオートローダを利用します
require dirname(__DIR__) . '/../vendor/autoload.php';

use keika299\ConohaAPI\Conoha;

//各サービスへの接続は全てこのクライアント情報を起点に行います
//ユーザーネーム、パスワード、そしてテナントID を配列として与えます
$client = new Conoha(array(
    'username'=>'API Username Here',                       
    'password'=>'API Password Here',
    'tenantId'=>'Tenant ID Here'
));

//クライアント情報からアカウントサービスへの接続を取得します
$accountService = $client->accountService();

//アカウントサービスから支払い履歴取得の API を起動します
echo json_encode($accountService->getPaymentHistory());
```

CHAP はクライアント作成時に自動的にトークンを生成し、そのトークンを利用してサービスへ接続します。  
しかし、このコードではクライアント作成時に毎回トークンを生成してしまいます。  
一度生成されたトークンを利用するためには、次のコードを使用します。  

```
$client = new Conoha(array(
    'tenantId'=>'Tenant ID Here',
    'token' => 'Token Here'
));
```

このコードではクライアント生成時にトークンを一緒に渡しています。  
このようにすることで CHAP は余分なトークンの生成を行わず、与えられたトークンで接続を試みます。

その他、API の詳細は [ConoHa API Documentation](https://www.conoha.jp/docs/index.html) を、  
CHAP の使用方法は examples を参照してください。

## Contribution
CHAP の充実に手を貸してもらえるのですか？ありがとうございます！  
私たちはあなたの参加を歓迎します！

### 新規機能の追加やバグフィックス

私たちは常に便利な新しい機能やバグへの対応を行っています。
ライブラリへの機能追加やバグフィックスは次の様に行って下さい。

1. このリポジトリを Fork します
2. 内容が分かりやすい名前で作業用ブランチを作成します。
3. 変更内容をコミットします。
4. ブランチをプッシュします。
5. 新しくプルリクエストを作成します。

変更内容について phpunit を利用してテストをして下さい。
テストのコマンドは次の通りです

```
vendor/bin/phpunit/ --configuration phpunit.xml.dist
```

### ドキュメント・コメントの充実

より利用しやすい、ユーザーに優しいライブラリを目指しています。  
そのためにはドキュメントやコメントの充実が必要です。

ドキュメント・コメントの変更は新規機能追加・バグフィックスと同様の手順で行って下さい。  
自分で変更するのが難しい、手間だと感じる方は、issue からの報告も歓迎しています。

### バグの報告・新機能やその他の提案

バグを発見しましたか？または新しい機能や、あると便利な機能を思いつきましたか？  
それらを是非 issue で報告して下さい。  
私たちにはそれらの報告を受け取り、よりよいライブラリの作成をするための用意があります。

### ライブラリの使用

もちろん、ライブラリは使用して下さる方がいてこそ意味があります。  
ぜひあなたが素晴らしいプロジェクト・ソフトウェアを開発するために CHAP を利用して下さい。  
あなたに CHAP を使っていただけることが、私たちが開発する意味となり励みになります！

## LICENSE
このソフトウェアは MIT ライセンスの下で公開されています。 LICENSE.txt を参照して下さい。

This software is released under the MIT License, see LICENSE.txt.