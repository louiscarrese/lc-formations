function printParameterController($uibModalInstance) {
    var self = this;
    self.modalInstance = $uibModalInstance;

    self.close = close;

    function close() {
        self.modalInstance.close();
    }
    
}