## Demo Site / デモサイト

Website: https://poch12.id/uriagekanri/
Username : admin
Password : password


# 売上管理システム / Sales Management System

売上・経費・商品・ユーザーを一元管理するための業務向けWebシステムです。  
Admin / Staff の権限に応じて利用できる機能を分け、日々の売上入力、経費管理、在庫管理、CSV出力などを行えます。

A business-oriented web system for managing sales, expenses, products, inventory, and users in one place.  
Available functions differ depending on the user's role: **Admin** or **Staff**.

---

## 日本語

### 概要

本システムは、日々の売上・経費を記録し、Dashboardで集計結果を確認するための売上管理システムです。

主な業務フローは以下です。

1. ログイン
2. 商品・在庫の確認
3. 売上・経費の登録
4. Dashboardで集計確認
5. 必要に応じて売上データをCSV出力
6. ログアウト

---

### 主な機能

#### Dashboard

以下の金額を確認できます。

- 売上合計
- 経費合計
- 純売上

Admin は全ユーザー分、Staff は自分が登録したデータのみ集計されます。

---

#### 売上管理

売上登録時に以下の情報を入力します。

- 売上日
- 商品
- 販売数
- 支払方法
  - 現金
  - カード
  - QR決済

合計金額は商品単価と販売数から自動計算されます。

また、売上登録後は商品の在庫数が販売数に応じて自動的に減少します。

売上一覧では以下の情報を確認できます。

- 売上日
- 商品名
- 数量
- 合計金額
- 支払方法
- 登録ユーザー（Adminのみ）

さらに、期間を指定して売上データをCSV形式で出力できます。

---

#### 経費管理

以下の情報を登録できます。

- 経費日
- 経費名
- 金額
- メモ

登録した経費は一覧画面から確認・削除できます。

Staff は自分が登録した経費のみ操作できます。

---

#### 商品管理

商品管理は **Adminのみ** 利用できます。

以下の操作が可能です。

- 商品追加
- 商品編集
- 商品削除
- 在庫管理

商品情報：

- 商品コード
- 商品名
- 価格
- 在庫

商品コードは重複できず、登録後は変更できません。

売上履歴で使用されている商品は削除できないため、販売を停止したい場合は在庫を `0` に設定します。

---

#### ユーザー管理

ユーザー管理は **Adminのみ** 利用できます。

以下の操作が可能です。

- ユーザー追加
- Password変更
- ユーザー有効化
- ユーザー無効化

ユーザー登録時には以下を設定します。

- User ID
- 名前
- Password
- Role

Role：

- `Admin`
- `Staff`

新規ユーザーは `Active` 状態で作成されます。

---

### 権限

| 機能 | Admin | Staff |
|---|---|---|
| Dashboard | 全ユーザー分 | 自分の登録分 |
| 売上管理 | 全ユーザー分 | 自分の登録分 |
| 経費管理 | 全ユーザー分 | 自分の登録分 |
| 商品管理 | 利用可能 | 利用不可 |
| ユーザー管理 | 利用可能 | 利用不可 |

---

### CSV出力

売上一覧画面から開始日・終了日を指定し、売上データをCSV形式で出力できます。

CSVには以下の情報が含まれます。

- ID
- 売上日
- 商品コード
- 数量
- 合計金額
- 支払方法

---

### 入力チェック・エラー処理

システムでは主に以下のチェックを行います。

- 必須項目チェック
- 販売数が1以上か
- 販売数が在庫数を超えていないか
- 商品コードの重複
- 売上履歴が存在する商品の削除制限
- CSV出力期間のチェック
- 無効化されたユーザーのログイン制限

---

### セキュリティ上の注意

- 初期Passwordは利用開始後すぐに変更する
- User ID / Passwordを他の利用者と共有しない
- Admin権限は必要な担当者のみに付与する
- 削除前に対象データを確認する
- CSVファイルの保存場所と共有範囲を適切に管理する

---

### セットアップについて

現在の操作手順書では、以下は対象外となっています。

- インストール
- サーバー設定
- データベース構築

そのため、実際のGitHubリポジトリに公開する際は、環境構築手順を別途READMEへ追加することを推奨します。

---

### Author

**Wakabayashi Kholil Masumi Putra**

---

## English

### Overview

This project is a sales management system designed to record daily sales and expenses and review summarized results through a dashboard.

The basic workflow is:

1. Log in
2. Check products and inventory
3. Register sales and expenses
4. Review totals on the Dashboard
5. Export sales data to CSV when required
6. Log out

---

### Main Features

#### Dashboard

The dashboard displays:

- Total Sales
- Total Expenses
- Net Sales

Admins can view aggregated data for all users, while Staff members can only view data they registered themselves.

---

#### Sales Management

Users can register sales with the following information:

- Sales date
- Product
- Quantity
- Payment method
  - Cash
  - Card
  - QR payment

The total amount is automatically calculated based on the product price and quantity.

Product inventory is also automatically reduced when a sale is registered.

The sales list displays:

- Sales date
- Product name
- Quantity
- Total amount
- Payment method
- Registered user (Admin only)

Sales data can also be exported to CSV for a selected date range.

---

#### Expense Management

Users can register:

- Expense date
- Expense name
- Amount
- Memo

Registered expenses can be reviewed and deleted from the expense list.

Staff members can only manage expenses they registered themselves.

---

#### Product Management

Product management is available to **Admin users only**.

Available operations include:

- Add product
- Edit product
- Delete product
- Manage inventory

Product information includes:

- Product code
- Product name
- Price
- Stock quantity

Product codes must be unique and cannot be changed after registration.

Products that are already referenced in sales history cannot be deleted. To stop selling such a product while keeping its history, its stock can be set to `0`.

---

#### User Management

User management is available to **Admin users only**.

Admins can:

- Add users
- Change passwords
- Activate users
- Deactivate users

User registration includes:

- User ID
- Name
- Password
- Role

Available roles:

- `Admin`
- `Staff`

New users are created with `Active` status.

---

### User Roles

| Feature | Admin | Staff |
|---|---|---|
| Dashboard | All users | Own records only |
| Sales Management | All users | Own records only |
| Expense Management | All users | Own records only |
| Product Management | Available | Not available |
| User Management | Available | Not available |

---

### CSV Export

Sales data can be exported by specifying a start date and end date.

The exported CSV contains:

- ID
- Sales date
- Product code
- Quantity
- Total amount
- Payment method

---

### Validation and Error Handling

The system includes checks for:

- Required fields
- Quantity must be at least 1
- Quantity must not exceed available stock
- Duplicate product codes
- Prevention of deleting products referenced by sales history
- Valid CSV export date ranges
- Login restrictions for inactive users

---

### Security Notes

- Change the initial password immediately after first use
- Do not share User IDs or passwords
- Limit Admin privileges to users who require them
- Confirm the target data before performing delete operations
- Manage CSV storage locations and sharing permissions carefully

---

### Setup

The supplied operation manual does not cover:

- Installation
- Server configuration
- Database setup

For a public GitHub repository, environment setup instructions should therefore be added separately based on the actual project configuration.

---

### Author

**Wakabayashi Kholil Masumi Putra**
