<div class="modal" id="modalVeiculo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Veículo</h1>
                
            </div>
            <div class="modal-body">

             
                <div id="CadastrarVeiculo">
                    <form>
                        
                    <div class="mb-3">
                            <label for="proprietario" class="form-label">Proprietario</label>
                            <input type="text" class="form-control" id="proprietario">

                        </div>
                        <div class="mb-3">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca">

                        </div>
                        <div class="mb-3">
                            <label for="modelo" class="form-label">Modelo:</label>
                            <input type="text" class="form-control" id="modelo">
                        </div>
                        <div class="mb-3">
                            <label for="versao" class="form-label">Versão:</label>
                            <input type="text" class="form-control" id="versao">
                        </div>
                        <div class="mb-3">
                            <label for="placa" class="form-label">Placa:</label>
                            <input type="text" class="form-control" id="placa" onkeypress="$(this).mask('AAA-0000')">
                        </div>
                        
                        <div class="mb-3">
                        
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" onkeypress="$(this).mask('(00) 00000-0009')">
                        </div>
                        
                    </form>
                </div>

            </div>

            <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CloseVeiculo" aria-label="Close">Close</button>
                <button type="button" class="btn btn-primary" id="enviar">Savar</button>
            </div>
        </div>
    </div>
</div>