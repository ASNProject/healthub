<?php
    require_once 'config.php';
    require_once 'heartrate_data.php';
    require_once 'pasien_data.php';
    require_once 'admin.php';
    require_once 'saturation_data.php';
    require_once 'suhu_data.php';
    require_once 'update_data.php';
    $heartrateObj = new HeartRate($conn);
    $pasienObj = new PasienData($conn);
    $adminObj = new Admin($conn);
    $saturationObj = new Saturation($conn);
    $suhuObj = new Suhu($conn);
    $updateObj = new UpdateData($conn);
    $method = $_SERVER['REQUEST_METHOD'];
    $endpoint = $_SERVER['PATH_INFO'];
    header('Content-Type: application/json');

    switch($method) {
        case 'GET':
            if ($endpoint === '/heartrates') {
                $heartrates = $heartrateObj->getAllHearrateData();
                echo json_encode($heartrates);
            } elseif (preg_match('/^\/heartrates\/(\d+)$/', $endpoint, $matches)) {
                $heartrateId = $matches[1];
                $heartrate = $heartrateObj->getHearrateDataById($heartrateId);
                echo json_encode($heartrate);
            } elseif ($endpoint == '/pasiendata'){
                $pasiens = $pasienObj->getAllPasienData();
                echo json_encode($pasiens);
            } elseif (preg_match('/^\/pasiendata\/(\d+)$/', $endpoint, $matches)) {
                $pasiendataId = $matches[1];
                $pasiens = $pasienObj->getPasienDataById($pasiendataId);
                echo json_encode($pasiens);
            } elseif ($endpoint == '/admin'){
                $admins = $adminObj->getAllAdminData();
                echo json_encode($admins);
            } elseif (preg_match('/^\/admin\/(\d+)$/', $endpoint, $matches)) {
                $adminId = $matches[1];
                $admins = $adminObj->getAdminDataById($adminId);
                echo json_encode($admins);
            } elseif ($endpoint == '/saturations'){
                $saturations = $saturationObj->getAllSaturationData();
                echo json_encode($saturations);
            } elseif (preg_match('/^\/saturations\/(\d+)$/', $endpoint, $matches)) {
                $saturationId = $matches[1];
                $saturations = $saturationObj->getSaturationDataById($saturationId);
                echo json_encode($saturations);
            } elseif ($endpoint == '/suhu'){
                $suhus = $suhuObj->getAllSuhuData();
                echo json_encode($suhus);
            } elseif (preg_match('/^\/suhu\/(\d+)$/', $endpoint, $matches)) {
                $suhuId = $matches[1];
                $suhus = $suhuObj->getSuhuDataById($suhuId);
                echo json_encode($suhus);
            } elseif ($endpoint == '/update'){
                $updates = $updateObj->getAllUpdateData();
                echo json_encode($updates);
            } elseif (preg_match('/^\/update\/(\d+)$/', $endpoint, $matches)) {
                $updateId = $matches[1];
                $updates = $suhuObj->getSuhuDataById($updateId);
                echo json_encode($updates);
            }
            break;
        case 'POST':
            if ($endpoint === '/heartrates') {
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $heartrateObj->addHearrateData($data);
                echo json_encode(['success' => $result]);
            } elseif ($endpoint === '/pasiendata'){
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $pasienObj->addPasienData($data);
                echo json_encode(['success' => $result]);
            } elseif ($endpoint === '/admin'){
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $adminObj->addAdminData($data);
                echo json_encode(['success' => $result]);
            } elseif ($endpoint === '/saturation'){
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $saturationObj->addSaturationData($data);
                echo json_encode(['success' => $result]);
            } elseif ($endpoint === '/suhu'){
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $suhuObj->addSuhuData($data);
                echo json_encode(['success' => $result]);
            } elseif ($endpoint === '/update'){
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $updateObj->addUpdateData($data);
                echo json_encode(['success' => $result]);
            }
            break;
        case 'PUT':
            if (preg_match('/^\/heartrates\/(\d+)$/', $endpoint, $matches)){
                $heartrateId = $matches[1];
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $heartrateObj->updateHearrateData($heartrateId, $data);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/pasiendata\/(\d+)$/', $endpoint, $matches)){
                $pasiendataId = $matches[1];
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $pasienObj->updatePasienData($pasiendataId, $data);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/admin\/(\d+)$/', $endpoint, $matches)){
                $adminId = $matches[1];
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $adminObj->updateAdminData($adminId, $data);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/saturations\/(\d+)$/', $endpoint, $matches)){
                $saturationId = $matches[1];
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $saturationObj->updateSaturationData($saturationId, $data);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/suhu\/(\d+)$/', $endpoint, $matches)){
                $suhuId = $matches[1];
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $suhuObj->updateSuhuData($suhuId, $data);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/update\/(\d+)$/', $endpoint, $matches)){
                $updateId = $matches[1];
                $data = json_decode(file_get_contents('php://input'), true);
                $result = $updateObj->updateUpdateData($updateId, $data);
                echo json_encode(['success' => $result]);
            }
            break;
        case 'DELETE':
            if (preg_match('/^\/heartrates\/(\d+)$/', $endpoint, $matches)){
                $heartrateId = $matches[1];
                $result = $heartrateObj->deleteHearrateData($heartrateId);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/pasiendata\/(\d+)$/', $endpoint, $matches)){
                $pasiendataId = $matches[1];
                $result = $pasienObj->deletePasienData($pasiendataId);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/admin\/(\d+)$/', $endpoint, $matches)){
                $adminId = $matches[1];
                $result = $adminObj->deleteAdminData($adminId);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/saturations\/(\d+)$/', $endpoint, $matches)){
                $saturationId = $matches[1];
                $result = $saturationObj->deleteSaturationData($saturationId);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/suhu\/(\d+)$/', $endpoint, $matches)){
                $suhuId = $matches[1];
                $result = $suhuObj->deleteSuhuData($suhuId);
                echo json_encode(['success' => $result]);
            } elseif (preg_match('/^\/update\/(\d+)$/', $endpoint, $matches)){
                $updateId = $matches[1];
                $result = $updateObj->deleteUpdateData($updateId);
                echo json_encode(['success' => $result]);
            }
            break;
    }
?>