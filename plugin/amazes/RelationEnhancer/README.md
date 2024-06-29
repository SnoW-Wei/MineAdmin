# 模型关联增强组件

![应用图标](https://cdn.mineadmin.com/2024/05/23/ef456ee443f5ac610056df9634da2d01.png)

## 简介

**模型关联增强组件** 是一款为 MineAdmin 框架设计的组件，旨在为模型提供更多样化的关联方案。通过使用这个组件，开发者可以更方便地实现复杂的数据关联，提高开发效率和代码可读性。

## 功能介绍

### 主要功能

1. **提供更多关联方案**: 目前支持 HasManyBySet 关联，未来会提供更多的关联解决方案。
2. **简化关联定义**: 使用方法与框架自带的关联方案基本一致，通过 `with` 方法来使用，方便快捷。

## 使用方法

### 安装步骤
参考mineAdmin插件安装步骤

### 定义关联
在需要使用关联的模型中定义关联。与框架自带的hasMany/hasOne等关联方法使用相同的定义方式
在模型中 use EnhancerRelationships;
以下以 hasManyBySet 关联为例，定义关联如下：

```php
class User extends Model
{
    use \Amazes\RelationEnhancer\Concerns\EnhancerRelationships;
    // 关联 用户分类 信息
    public function categorys()
    {
        return $this->hasManyBySet(Cate::class, 'category_ids', 'id');
    }
}
```
### 查询关联
在查询时，通过 with 方法来使用定义好的关联：
```php
$users = User::query()->with(['categorys'])->get();
```
## 各关联方案说明
### HasManyBySet
<details>
  <summary>使用说明</summary>

>主表中存在一个字段存储关联的子表的主键,不限定该字段的类型
>
>仅要求 通过 $model->{$fieldName}获取到的该字段的数据是如下类型之一
>1. 数组 [id1,id2,...]
>2. 字符串 'id1,id2,...'

**主表 user**

| 字段名          | 类型                   | 说明                                   |
|--------------|----------------------|--------------------------------------|
| id           | int                  | 主键                                   |
| category_ids | varchar / json / ... | 分类ids 多个id用英文逗号隔开,或json存储ids数组,或其他形式 |

**子表 category**

| 字段名  | 类型      | 说明   |
|------|---------|------|
| id   | int     | 主键   |
| name | varchar | 分类名称 |

**主表模型**
```php
class User extends Model
{

    use \Amazes\RelationEnhancer\Concerns\EnhancerRelationships;
   
    # 省略其代码
    protected $table = 'user';
    
    // 如果字段是字符串 'id1,id2,...' 这种类型的 可以不做转换
    // 通过定义cats使得  category_ids 最终转换成数组 [1,2,...]
    protected $cats = [
        'category_ids' => 'array'
    ];
    
    // 如果字段是字符串 'id1,id2,...' 这种类型的 可以不做转换
    // 或者可以通过 修改器 返回数组
    // public function getCategoryIdsAttribute($value){
    //     return explode(',',$value);
    // }
    
    // 关联 用户分类 信息
    public function categorys()
    {
        return $this->hasManyBySet(Category::class, 'category_ids', 'id');
    }
    # 省略其代码
}
```

**子表模型**
```php
class Category extends Model
{
    protected $table = 'category';
    # 省略其代码
}
```
</details>

### 更多方案

>更多方案正在开发中
> 
### 问题反馈&联系我们

>如果您有想法,建议或反馈,可以在mineadmin官方交流群反馈
>也可以联系微信：`AMAZES_CC`
