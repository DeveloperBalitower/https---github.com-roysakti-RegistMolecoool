<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-table"></i>&nbsp; <span class="title-page"><?= strtoupper($lbl_controller) ?></span>
      <small>List of Data</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-table"></i> <?= ucwords($lbl_controller) ?></a></li>
      <li class="active">List of data</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
    [{GRIDVIEW_HTML_FILTER}]
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <div id='callback_msg'></div>
            <table id="tablelist" class="table table-bordered table-striped" style="width: 100%">
              <thead>
                <tr>
                  <th style="width:3%"></th>
                  [{GRIDVIEW_LABEL}]
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="modalForm" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog [{SIZE_MODAL}]" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-table"></i> <?= strtoupper($lbl_controller) ?> FORM</h4>
      </div>
      <div class="modal-body">
        <div id="tableModal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
        <button type="button" id="btnSave" class="btn btn-success">SAVE</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url("assets/backend") ?>/controller/[{CONTROLLER}].js"></script>