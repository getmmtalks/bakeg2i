<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Marcas Controller
 *
 * @property \App\Model\Table\MarcasTable $Marcas
 * @method \App\Model\Entity\Marca[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MarcasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $marcas = $this->paginate($this->Marcas);

        $this->set(compact('marcas'));
    }

    /**
     * View method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $marca = $this->Marcas->get($id, [
            'contain' => ['Veiculos'],
        ]);

        $this->set(compact('marca'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $marca = $this->Marcas->newEmptyEntity();
        if ($this->request->is('post')) {
            $marca = $this->Marcas->patchEntity($marca, $this->request->getData());
            if ($this->Marcas->save($marca)) {
                $this->Flash->success(__('A marca foi salva.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A marca não pode ser salva. Por favor, tente novamente.'));
        }
        $this->set(compact('marca'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $marca = $this->Marcas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $marca = $this->Marcas->patchEntity($marca, $this->request->getData());
            if ($this->Marcas->save($marca)) {
                $this->Flash->success(__('A marca foi salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A marca não pode ser salva. Por favor, tente novamente.'));
        }
        $this->set(compact('marca'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Marca id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $marca = $this->Marcas->get($id);
        if ($this->Marcas->delete($marca)) {
            $this->Flash->success(__('A marca foi deletada.'));
        } else {
            $this->Flash->error(__('A marca não pôde ser deletada. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
