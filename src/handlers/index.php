<?php

namespace Handlers;

use Classes\PersonType;
use Database\Repositories\EmployeeRepository;
use Database\Repositories\EmployerRepository;
use Database\Repositories\PersonRepository;

spl_autoload_register(function ($class) {
    // as namespaces are case-sensitive, we need to make sure the path is correct. For
    // example, if the namespace is "Classes", the path should be "{parent directory}/classes/Person.php"
    $namespace = substr($class, 0, strrpos($class, '\\'));
    $classname = substr($class, strrpos($class, '\\') + 1);

    $path = __DIR__ . '/../' . strtolower(str_replace('\\', '/', $namespace)) . "/$classname.php";

    include_once($path);
});

session_start();

include "./utils.php";

$person = null;


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

function is_logged_in(): bool
{
    return isset($_SESSION["email"]);
}

if (is_logged_in()) {
    $person_repository = new PersonRepository();
    $person_type = $person_repository->getPersonType($_SESSION["email"]);

    if (!$person_type) {
        redirect_to("/?page=error&error=L'utilisateur ne correspond à aucun groupe!");
        exit();
    }

    if (!isset($_GET["page"])) {
        $path = "/?page=" . ($person_type === PersonType::Employee ? "employee" : "employer") . "/";
        if (str_starts_with($path, "/")) {
            redirect_to($path);
            exit();
        }
    }

    if ($person_type === PersonType::Employee) {
        $employee_repository = new EmployeeRepository();
        $person = $employee_repository->get($_SESSION["email"]);
    } else if ($person_type === PersonType::Employer) {
        $employer_repository = new EmployerRepository();
        $person = $employer_repository->get($_SESSION["email"]);
    }
}
