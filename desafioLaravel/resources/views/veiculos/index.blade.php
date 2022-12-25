@extends('_layout.app')
@include('_layout.navbar')

@section('conteudo')
@include('veiculos.modalVeiculo')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content">
        <div class="container">
            <div>
                <h1>Lista de Veículos</h1>
                
                <button type="button" class="btn btn-primary" id="NovoVeiculo">Novo Veículo</button>
            </div>
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>

                        <th>Propietario</th>
                        <th>Marca/Modelo/Versão</th>
                        <th>Placa</th>
                        <th>Teleone</th>
                        
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody id="tabela_veiculos">


                </tbody>
            </table>


        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@endsection
<!-- /.content-wrapper -->