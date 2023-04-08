<div class="influence-profile-content pills-regular">
    <ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" style="list-style: none !important;overflow-x: auto; white-space: nowrap;" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?= ($this->uri->segment(1) == "add-new-application") ? "active" : "" ?>" href="<?= base_url('add-new-application') ?>">Personal Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled <?= ($this->uri->segment(1) == "add-student-education") ? "active" : "" ?> " <?php
                                                                                                            if (isset($_GET['applicationID'])) {
                                                                                                            ?> href="<?= base_url('add-student-education?applicationID=' . $_GET['applicationID']) ?>" <?php
                                                                                                                                                                                                    }
                                                                                                                                                                                                        ?>>Education</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Reviews</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Send Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Send Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Send Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Send Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Send Messages</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">Send Messages</a>
        </li>
    </ul>

</div>