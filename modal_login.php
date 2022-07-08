<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLogin">Entrar</h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form onsubmit="logarUsuario(this)">
                        <input type="hidden" value="logar_usuario" id="operacao" name="operacao">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="email_aluno" class="form-label">E-mail</label>
                                <input type="text" class="form-control" id="email_aluno" placeholder="aluno@exemplo.com..." required>
                            </div>

                            <div class="col-12">
                                <label for="senha_aluno" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha_aluno" placeholder="********" required>
                            </div>
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Logar</button>
            </div>
            </form>
        </div>
    </div>
</div>