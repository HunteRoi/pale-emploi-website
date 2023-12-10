<?php

function redirect_to(string $url, int $delay = 1)
{
    echo <<<HTML
<script type="text/javascript">
    console.log(`redirecting to $url in $delay seconds`);
    
    setTimeout(
        function () {
            window.location.href = `$url`;
        },
        $delay
    )
</script>
HTML;
    exit();
}

function debug($var): void
{
    echo <<<HTML
<script>
    function closeDebugModal() {
        $("#debug_modal").modal("hide");
    }
</script>
<div class="modal fade" id="debug_modal" tabindex="-1" role="dialog" aria-labelledby="debug_modal_label"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="debug_modal_label">Debug Modal</h5>
                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close" onclick="closeDebugModal()">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <pre class="modal-body">
HTML;
    var_dump($var);
    echo <<<HTML
            </pre>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeDebugModal()">Fermer</button>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener("load", function () {
        $("#debug_modal").modal("show");
    });
</script>
HTML;
}
