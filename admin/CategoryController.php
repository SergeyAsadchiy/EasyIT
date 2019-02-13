<?php 

/**
 * 
 */
class CategoryController extends Controller 
{
	
	function __construct()
	{
		$this->model = new CategoryModel;
		$this->model->table = "Categories";
	}

	public function view($template, $data) {
        extract($data);
        include 'admin/'.$template.'.php';
    }
    
	public function show()
	{
		$data = [
			'categories' => $this->model->getCategories()
		];
		$this->view('templ_category', $data);
	}

	public function add()
	{
		if (!empty($_POST)) {
			$data = [
				'category' => $_POST['category']
			];
			$this->model->create($data);
			redirect('/category');
		} else {
			$data = [];
			$this->view('addCategoryForm', $data);
		}
		
	}

	public function edit()
	{
		if (!empty($_POST)) {
			$data = [
				'category' => $_POST['category']
			];
			$this->model->update($data);
			redirect('/category');
		} else {
			$data = [
                'item' => $this->model->readId($_GET['id']),
            ];
			$this->view('editCategoryForm', $data);
		}
		
	}

	public function delete()
	{
		$this->model->deleteId($_GET['id']);
		redirect('/category');		
	}
}