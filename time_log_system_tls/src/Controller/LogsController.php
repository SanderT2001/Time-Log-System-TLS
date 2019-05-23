<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Logs Controller
 *
 * @property \App\Model\Table\LogsTable $Logs
 *
 * @method \App\Model\Entity\Log[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LogsController extends AppController
{
	/**
     * Index method
     *
	 * Gathering all the records in logs and the corresponding TimeTypes and Projects. 
	 * After gathering compacting those variables (that data) to the index.ctp (index view).
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['TimeTypes', 'Projects']
        ];

		$logs = $this->paginate($this->Logs);

		$timeTypes = $this->Logs->TimeTypes->find('list');
		$projects = $this->Logs->Projects->find('list');

		$this->set(compact('logs', 'timeTypes', 'projects'));
	}

	/**
	 * getData mehotd
	 *
	 * @param $id, used to get the right/requested record. 
	 *
	 * This is a extended version of the view() method in which the collected data is being put into a array to then convert it to a json readable data source. 
	 * The json encode is needed for the ajax call to return a result.
	 * Also autoRender is disabled to make sure the ajax call won't trigger CakePHP to look for an template of getData.
	 * Also when time type or projectis empty it will be set to None, to avoid a ajax error.
	 * All the date and time specific variables are also being reformatted to my liking (yyyy-MM-dd & HH:mm:ss) using the i18n time extension.
	 */ 

	public function getData($id)
	{
		$this->autoRender = false;

		if ($this->request->is(array('ajax')))
		{
	        $data = $this->Logs->get($id, [
            	'contain' => ['TimeTypes', 'Projects']
			]);

			$timeTypeName = (empty($data->time_type->type_name)) ? '' : $data->time_type->type_name;
			$projectName = (empty($data->project->project_name)) ? '' : $data->project->project_name;			

			$date = $data->log_date->i18nFormat('yyyy-MM-dd');

			$startTime = $data->log_start_time->i18nFormat('HH:mm:ss');
			$endTime = $data->log_end_time->i18nFormat('HH:mm:ss');

			$json_data = json_encode(
				array('result' => [
					'id' => $data->ID,
					'time_type' => $timeTypeName,
					'project' => $projectName,
					'summary' => $data->log_summary,
					'description' => $data->log_description,
					'retrospective' => $data->log_retrospective,
					'date' => $date,
					'start_time' => $startTime,
					'end_time' => $endTime,
					'difference_time' => $data->log_time_diff_min,
				])
			);

			$this->response->type('json');
			$this->response->body($json_data);
			return $this->response;
		}	
	}

	/**
	 * addData 
	 *
	 * This is a extended version of the add() method in which first a newEntity (new empty record) is being created and after that the send data (put data) is being tranferred into the empty record (@var$log).
	 * To be able to send the @var $log->log_date, @var $log->log_start_time and the @var $log->log_end_time, it is needed to specifically fill those items with the send data. 
	 * Also autoRender is disabled to make sure the ajax call won't trigger CakePHP to look for an template of getData.
	 */

	public function addData()
	{
		$this->autoRender = false;
		$this->request->allowMethod(['post', 'put']);

		if ($this->request->is(array('ajax')))
		{
			$log = $this->Logs->newEntity();

			$log = $this->Logs->patchEntity($log, $this->request->getData());
			$log->log_date = $this->request->getData(log_date);
			$log->log_start_time = $this->request->getData(log_start_time);
			$log->log_end_time = $this->request->getData(log_end_time);

			if ($this->Logs->save($log)) 
			{
                $this->Flash->success('The log has been saved.');
            }
		}

		$this->response->type('html');
		return $this->response;
	}

	/**
	 * editData
	 *
	 * @param $id, used to edit the right/requested record. 
	 *
	 * This is a extended version of the edit() method in which the same happens as in the addData() method. The only difference is that the @var $log, is now not a new enitity, but the record you want to edit. That is why @param $id 	  * is needed.
	 */

	public function editData($id)
	{
		$this->autoRender = false;
		$this->request->allowMethod(['post', 'put']);

		if ($this->request->is(array('ajax')))
		{
			$log = $this->Logs->get($id);

			$log = $this->Logs->patchEntity($log, $this->request->getData());
			$log->log_date = $this->request->getData(log_date);
			$log->log_start_time = $this->request->getData(log_start_time);
			$log->log_end_time = $this->request->getData(log_end_time);

			if ($this->Logs->save($log)) 
			{
				$this->Flash->success("Edited");
			}
		}

		$this->response->type('html');
		return $this->response;
	}


	/**
	 * deleteData
	 *
	 * @param $id, used to remove the right/requested record.
	 *
	 * This is a extended version of the delete() method in which again the autoRender is disabled to make sure the ajax call won't trigger CakePHP to look for an template of deleteData.
	 * This method gets the right record using the @param $id, and then removing it. 
	 */

	public function deleteData($id)
	{
		$this->autoRender = false;
        $this->request->allowMethod(['post', 'delete']);
		
		if ($this->request->is(array('ajax')))
		{
			$log = $this->Logs->get($id);
        	
			if ($this->Logs->delete($log)) 
			{
            	$this->Flash->success(__('The log has been deleted.'));
			} 
			else 
			{
            	$this->Flash->error(__('The log could not be deleted. Please, try again.'));
			}

			$this->response->type('html');
			return $this->response;
		}
	}
}
