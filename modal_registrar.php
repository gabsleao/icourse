<!-- Modal -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="modalRegistro" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRegistro">Registrar</h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form onsubmit="registrarUsuario(this)">
                        <input type="hidden" value="registrar_usuario" id="operacao" name="operacao">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="nome_aluno" class="form-label">Nome</label><span style="color: red;"> *</span>
                                <input type="text" class="form-control" id="nome_aluno" placeholder="Gabriel..." required>
                            </div>

                            <div class="col-12">
                                <label for="email_aluno" class="form-label">E-mail</label><span style="color: red;"> *</span>
                                <input type="text" class="form-control" id="email_aluno" placeholder="aluno@exemplo.com..." required>
                            </div>

                            <div class="col-12">
                                <label for="senha_aluno" class="form-label">Senha</label><span style="color: red;"> *</span>
                                <input type="password" class="form-control" id="senha_aluno" placeholder="********" required minlength="8">
                            </div>

                            <div class="col-12">
                                <label for="senha_aluno_confirmacao" class="form-label">Confirmar Senha</label><span style="color: red;"> *</span>
                                <input type="password" class="form-control" id="senha_aluno_confirmacao" placeholder="********" required minlength="8">
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
