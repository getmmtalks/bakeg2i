<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Veiculos Controller
 *
 * @property \App\Model\Table\VeiculosTable $Veiculos
 * @method \App\Model\Entity\Veiculo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class APIController extends AppController
{
    public function listarMarcas(){
        try{

            $this->loadModel('Marcas');
            $resultset = $this->Marcas->find()->all()->toArray();

            return $this->response->withType('application/json')->withStringBody(json_encode(['sucesso' => true, "message"=>"", "dados"=>$resultset]));

        }catch(\Exception $e){
            return $response->withType('application/json')
            ->withStringBody(json_encode(['sucesso' => false, "message"=>$e->getMessage()]));
        }
    }

    public function listarAnos(){
        try{

            $this->loadModel('Veiculos');
            $resultset = $this->Veiculos->find()->select(['ano'])->group(['ano'])->toArray();

            return $this->response->withType('application/json')->withStringBody(json_encode(['sucesso' => true, "message"=>"", "dados"=>$resultset]));

        }catch(\Exception $e){
            return $this->response->withType('application/json')
            ->withStringBody(json_encode(['sucesso' => false, "message"=>$e->getMessage()]));
        }
    }

    public function buscarVeiculos(){
        try{

            $conditions = [];

            if(!empty($this->request->getQuery('veiculo_nome'))) array_push($conditions,['Veiculos.nome LIKE'=>'%'.$this->request->getQuery('veiculo_nome').'%']) ;
            if($this->request->getQuery('marca_id') != -1) array_push($conditions,['Veiculos.marca_id ='=>$this->request->getQuery('marca_id')]) ;
            if($this->request->getQuery('veiculo_ano') != -1) array_push($conditions,['Veiculos.ano ='=>$this->request->getQuery('veiculo_ano')]) ;
            
            $this->loadModel('Veiculos');
            $resultset = $this->Veiculos->find()->join([
                'table' => 'marcas',
                'alias' => 'm',
                'type' => 'LEFT',
                'conditions' => 'm.id = Veiculos.marca_id',
            ])->select(['marca_nome'=>'m.nome','marca_id'=>'m.id', 'veiculo_nome'=>'Veiculos.nome', 'veiculo_id'=>'Veiculos.id', 'veiculo_ano'=>'Veiculos.ano'])->where($conditions)->toArray();

            return $this->response->withType('application/json')->withStringBody(json_encode(['sucesso' => true, "message"=>"", "dados"=>$resultset]));

        }catch(\Exception $e){
            return $this->response->withType('application/json')
            ->withStringBody(json_encode(['sucesso' => false, "message"=>$e->getMessage()]));
        }
    }

}
