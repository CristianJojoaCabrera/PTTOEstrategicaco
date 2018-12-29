
<div class="ibox float-e-margins">

    <div class="ibox-title">
        <h5>Orden de Producción</h5>
        <div class="ibox-tools">
            <a class="collapse-link">
                <i class="fa fa-chevron-up"></i>
            </a>
        </div>
    </div>

    <div class="ibox-content">
        <div class="row">
            <div class="form-group col-lg-2">
                <label>Orden de producción</label>
                <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->id }}" id="txtOrder_id" name="txtOrder_id" readonly style="width:80px;height:30px">
            </div>
            <div class="form-group col-lg-4">
                <label>Cliente</label>
                <input type="text" class="form-control input-sm" value="{{ $orderDetail->order->client->bussiness_name }}" readonly>
            </div>
            <div class="form-group col-lg-2">
                <label>Local</label>
                <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->name }}" readonly>
            </div>
            <div class="form-group col-lg-2">
                <label>Ciudad</label>
                <input type="text" class="form-control input-sm" value="{{ $orderDetail->local->city }}" readonly>
            </div>
            <div class="form-group col-lg-2">
                <label>Fecha</label>
                <input type="text" class="form-control input-sm" value="{{ date('Y-m-d') }}" readonly>
            </div>
        </div>
    </div>
</div>
