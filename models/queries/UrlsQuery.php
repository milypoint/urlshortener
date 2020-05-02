<?php

namespace app\models\queries;

use yii\db\ActiveQuery;

class UrlsQuery extends ActiveQuery
{
    /**
     * @param string $url
     * @return UrlsQuery
     */
    public function byUrl($url)
    {
        return $this->andWhere(['url' => $url]);
    }
}
