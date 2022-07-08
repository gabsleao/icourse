<!-- Modal -->
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="modalLogout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLogout">Tem certeza que deseja sair?</h5>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <form onsubmit="logout(this)">
                        <input type="hidden" id="operacao" name="operacao" value="logout_usuario">
                        <div class="row g-3">
                            <div class="col-12 text-center">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary">Logout</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>