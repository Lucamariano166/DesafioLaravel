<div class="modal" id="modalManutencao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="ModalLabel">Novas Manutenções</h1>

            </div>
            <div class="modal-body">

                <div id="buscarPlaca" style="display:none">
                    <form>
                        <div class="col-md-6">
                            <label for="placa" class="form-label">Digite a placa</label>
                            <input type="text" class="form-control" id="placaDigitada">
                            <button type="button" id="btnPesquisarVeiculo" class="btn btn-primary">Pesquisar veículo</button>
                        </div>
                    </form>
                </div>

                <div class="form-row" id="CadastrarManutencao">
                    <form>
                        <div class="form-group col-md-6">
                            <label for="proprietario" class="form-label">Proprietario</label>
                            <input type="text" class="form-control" id="proprietario">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="marca" class="form-label">Marca</label>
                            <input type="text" class="form-control" id="marca">

                        </div>
                        <div class="form-group col-md-6">
                            <label for="modelo" class="form-label">Modelo:</label>
                            <input type="text" class="form-control" id="modelo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="versao" class="form-label">Versão:</label>
                            <input type="text" class="form-control" id="versao">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="placa" class="form-label">Placa:</label>
                            <input type="text" class="form-control" id="placa">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo de manutenção" class="form-label">Tipo de Manutenção:</label>
                            <select class="form-select form-select-sm" id="tipo_de_manutencao">
                                <option selected>Tipos de manutenção</option>
                                <option value="1">Manutenção Detectiva</option>
                                <option value="2">Manutenção Corretiva</option>
                                <option value="3">Manutenção Preventiva</option>
                                <option value="3">Manutenção Preditiva</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <input type="text" class="form-control" id="descricao">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="data_para_manutencao" class="form-label">Proxima manutenção:</label>
                            <input type="text" class="form-control" id="data_para_manutencao" onkeypress="$(this).mask('00-00-0000')">
                        </div>

                    </form>
                </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="CloseManutencao" aria-label="Close">Close</button>
                <button type="button" class="btn btn-primary" id="enviarManutencao">Savar</button>
            </div>
        </div>
    </div>
</div>