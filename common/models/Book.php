<?php

namespace common\models;

use common\traits\AttributesToInfoTrait;
use Yii;
use yii\web\UploadedFile;
use common\components\ActiveRecord;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $url
 * @property string $name [varchar(255)]
 * @property string $img
 * @property string $info
 */
class Book extends ActiveRecord
{
    use AttributesToInfoTrait;

    public $file;
    /**
     * {@inheritdoc}
     */

    public function attributesToInfo()
    {
        return [
        ];
    }
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file','extensions' => ['png', 'jpg', 'gif', 'PNG', 'JPG', 'GIF', 'JPEG', 'jpeg'],],
            [['url', 'image', 'name'], 'string', 'max' => 255],
        ];
    }
    /**
     * @param UploadedFile $file
     */
    private function saveFile(UploadedFile $file){
        $link = ($this->img) ? : null;
        $this->file = $file;
        if ($this->validate(['file'])) {
            $rand = uniqid(rand(), true);
            $dir = Yii::getAlias('@frontend/web/docs/news/');
            $dir2 = Yii::getAlias('docs/news/');
            $fileName = $rand . '.' . $this->file->extension;
            $this->file->saveAs($dir . $fileName);
            $this->file = $fileName; // без этого ошибка
            $link = '/'.$dir2 . $fileName;
        }

        $this->img = $link;
        $this->file = null;
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $file = UploadedFile::getInstance($this, "file");
        if ($file && $file->tempName) {
            $this->saveFile($file);
        }
        return parent::save($runValidation, $attributeNames); // TODO: Change the autogenerated stub
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'content' => Yii::t('app', 'Содержание'),
            'created_at' => Yii::t('app', 'Дата публикации'),
            'updated_at' => Yii::t('app', 'Дата изменения'),
            'status' => Yii::t('app', 'Статус'),
            'image' => Yii::t('app', 'Картинка'),
        ];
    }
}
