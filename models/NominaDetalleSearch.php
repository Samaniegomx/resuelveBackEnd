<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NominaDetalle;

/**
 * NominaDetalleSearch represents the model behind the search form of `app\models\NominaDetalle`.
 */
class NominaDetalleSearch extends NominaDetalle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_nominaDetalle', 'id_nomina', 'id_jugador', 'id_nivel', 'goles'], 'integer'],
            [['sueldo', 'bono', 'total'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = NominaDetalle::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_nominaDetalle' => $this->id_nominaDetalle,
            'id_nomina' => $this->id_nomina,
            'id_jugador' => $this->id_jugador,
            'id_nivel' => $this->id_nivel,
            'goles' => $this->goles,
        ]);

        $query->andFilterWhere(['like', 'sueldo', $this->sueldo])
            ->andFilterWhere(['like', 'bono', $this->bono])
            ->andFilterWhere(['like', 'total', $this->total]);

        return $dataProvider;
    }
}
