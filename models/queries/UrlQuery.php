<?php

namespace app\models\queries;

use yii\db\ActiveQuery;

class UrlQuery extends ActiveQuery
{
    /**
     * @param string $url
     * @return UrlQuery
     */
    public function byUrl($url)
    {
        return $this->andWhere(['url' => $url]);
    }
}
