<!-- Modal -->
<div class="modal fade" id="modalCriarInstituicao" tabindex="-1" role="dialog" aria-labelledby="modalCriarInstituicao" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCriarInstituicao">Adicionar nova Instituição</h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form onsubmit="novaInstituicao(this)">
                        <input type="hidden" id="operacao" name="operacao" value="salvar_instituicao">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="nome_instituicao" class="form-label">Nome</label><span style="color: red;"> *</span>
                                <input type="text" class="form-control" id="nome_instituicao" placeholder="Unicamp..." required>
                            </div>

                            <div class="col-12">
                                <label for="descricao_instituicao" class="form-label">Descrição</label><span style="color: red;"> *</span>
                                <textarea class="form-control" id="descricao_instituicao" placeholder="Universidade Estadual de Campinas considerada uma das melhores universidades do país e da América Latina..." required></textarea>
                            </div>

                            <div class="col-12">
                                <label for="tags_instituicao" class="form-label">Tags (separar for vírgula)</label><span style="color: red;"> *</span>
                                <textarea class="form-control" id="tags_instituicao" placeholder="estadual,faculdade,publica,vestibular..." required></textarea>
                            </div>

                            <div class="col-12">
                                <label for="endereco_instituicao" class="form-label">Endereço</label><span style="color: red;"> *</span>
                                <input type="text" class="form-control" id="endereco_instituicao" placeholder="Cidade Universitária Zeferino Vaz, Barão Geraldo..." required>
                            </div>

                            <div class="col-md-4">
                                <label for="cep" class="form-label">CEP</label>
                                <input type="text" class="form-control" id="cep" placeholder="13083-970..." required>
                            </div>

                            <div class="col-md-4">
                                <label for="estado_instituicao" class="form-label">Estado</label>
                                <select class="form-select" id="estado_instituicao" required>
                                    <option>Escolha...</option>
                                    <option value="SP">São Paulo</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="cidade_instituicao" class="form-label">Cidade</label>
                                <select class="form-select" id="cidade_instituicao" required>
                                    <option>Escolha...</option>
                                    <option value="CPS">Campinas</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Criar</button>
            </div>
            </form>
        </div>
    </div>
</div>