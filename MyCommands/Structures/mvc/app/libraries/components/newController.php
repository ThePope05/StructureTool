
<?php

class CONTROLLER_NAME extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'CONTROLLER_NAME'
        ];

        $this->view('CONTROLLER_NAME/index', $data);
    }
}
