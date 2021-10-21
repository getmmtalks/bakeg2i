<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Veiculos Controller
 *
 * @property \App\Model\Table\VeiculosTable $Veiculos
 * @method \App\Model\Entity\Veiculo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VeiculosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marcas'],
        ];
        $veiculos = $this->paginate($this->Veiculos);

        $this->set(compact('veiculos'));
    }

    /**
     * View method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $veiculo = $this->Veiculos->get($id, [
            'contain' => ['Marcas'],
        ]);

        $this->set(compact('veiculo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $veiculo = $this->Veiculos->newEmptyEntity();
        if ($this->request->is('post')) {
            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
            if ($this->Veiculos->save($veiculo)) {
                $this->Flash->success(__('O veículo foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O veículo não pôde ser salvo. Por favor, tente novamente.'));
        }
        $marcas = $this->Veiculos->Marcas->find('list', ['limit' => 200]);
        $this->set(compact('veiculo', 'marcas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $veiculo = $this->Veiculos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $veiculo = $this->Veiculos->patchEntity($veiculo, $this->request->getData());
            if ($this->Veiculos->save($veiculo)) {
                $this->Flash->success(__('O veículo foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O veículo não pôde ser salvo. Por favor, tente novamente.'));
        }
        $marcas = $this->Veiculos->Marcas->find('list', ['limit' => 200]);
        $this->set(compact('veiculo', 'marcas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Veiculo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $veiculo = $this->Veiculos->get($id);
        if ($this->Veiculos->delete($veiculo)) {
            $this->Flash->success(__('O veículo foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O veículo não pode ser deletado. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
