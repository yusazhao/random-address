# Random Address Generator

一个现代化的随机地址生成器，使用 PHP CodeIgniter 框架和 Tailwind CSS 构建。

## 功能特性

- 🌍 **多国家支持**: 支持超过50个国家的随机地址生成
- 📱 **响应式设计**: 完美适配PC端、平板和手机端
- 🎨 **现代化UI**: 使用Tailwind CSS构建的精致界面
- ⚡ **快速生成**: 点击即可生成真实有效的地址
- 📋 **一键复制**: 每个字段都可以单独复制到剪贴板
- 🔍 **SEO优化**: 完整的SEO元标签和结构化数据
- 🚀 **高性能**: 优化的代码结构和缓存机制

## 技术栈

- **后端**: PHP 7.4+ with CodeIgniter 3.x
- **前端**: Tailwind CSS 3.x
- **数据库**: MySQL 5.7+
- **JavaScript**: 原生JS，无外部依赖

## 安装和设置

### 1. 克隆项目

```bash
git clone <repository-url>
cd random-address
```

### 2. 安装依赖

```bash
npm install
```

### 3. 构建CSS

```bash
# 生产环境
npm run build

# 开发环境（监听文件变化）
npm run dev
```

### 4. 配置数据库

编辑 `application/config/database.php` 文件，配置数据库连接信息：

```php
$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'your_username',
    'password' => 'your_password',
    'database' => 'random_address',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt' => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
```

### 5. 导入数据库

执行SQL文件创建数据库表结构：

```sql
-- 地址表
CREATE TABLE `address` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `street` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `city_slug` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `state_slug` varchar(100) DEFAULT NULL,
  `state_code` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `country_slug` varchar(255) DEFAULT NULL,
  `country_code` varchar(10) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `gmt_created` timestamp NULL DEFAULT NULL,
  `gmt_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `idx_ccode_id` (`country_code`,`Id`),
  KEY `idx_ccode_scode_id` (`country_code`,`state_code`,`Id`),
  KEY `idx_city` (`country_code`,`state_code`,`city_slug`,`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- 国家表
CREATE TABLE `country` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(255) DEFAULT NULL,
  `country_slug` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `gmt_created` timestamp NULL DEFAULT NULL,
  `gmt_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- 州/省表
CREATE TABLE `country_state` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(255) DEFAULT NULL,
  `country_slug` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `state_slug` varchar(255) DEFAULT NULL,
  `state_code` varchar(255) DEFAULT NULL,
  `gmt_created` timestamp NULL DEFAULT NULL,
  `gmt_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `inx_country` (`country_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- 城市表
CREATE TABLE `country_city` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(50) DEFAULT NULL,
  `country_slug` varchar(50) DEFAULT NULL,
  `country_code` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `state_slug` varchar(50) DEFAULT NULL,
  `state_code` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `city_slug` varchar(50) DEFAULT NULL,
  `pop` int DEFAULT NULL,
  `gmt_created` timestamp NULL DEFAULT NULL,
  `gmt_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `inx_country_pop` (`country_code`,`pop`),
  KEY `inx_country_state` (`country_code`,`state_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
```

### 6. 配置Web服务器

确保Web服务器指向项目根目录，并配置URL重写规则。

#### Apache (.htaccess)

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [L]
```

#### Nginx

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

## 项目结构

```
random-address/
├── application/
│   ├── controllers/          # 控制器
│   ├── models/              # 模型
│   ├── views/               # 视图
│   └── config/              # 配置文件
├── static/
│   ├── css/                 # CSS文件
│   ├── js/                  # JavaScript文件
│   └── img/                 # 图片资源
├── system/                  # CodeIgniter系统文件
├── tailwind.config.js       # Tailwind配置
├── package.json             # NPM包配置
└── index.php               # 入口文件
```

## 开发指南

### 添加新国家

1. 在数据库中添加国家数据
2. 添加对应的国旗图片到 `static/img/flags/` 目录
3. 更新控制器中的国家列表

### 自定义样式

编辑 `static/css/input.css` 文件，然后运行：

```bash
npm run dev  # 开发模式，监听文件变化
```

### 添加新功能

1. 在 `application/controllers/` 中创建控制器
2. 在 `application/models/` 中创建模型
3. 在 `application/views/` 中创建视图
4. 更新路由配置

## 部署

### 生产环境

1. 设置环境变量 `ENVIRONMENT = 'production'`
2. 运行 `npm run build` 构建CSS
3. 配置Web服务器
4. 设置数据库连接
5. 确保文件权限正确

### 性能优化

- 启用PHP OPcache
- 配置数据库查询缓存
- 使用CDN加速静态资源
- 启用Gzip压缩

## 许可证

MIT License

## 贡献

欢迎提交Issue和Pull Request！

## 联系方式

- 邮箱: support@randomaddress.com
- 网站: https://randomaddress.com
