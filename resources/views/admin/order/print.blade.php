<!-- Modal -->
<div id="print-modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="width: 850px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center"></h4>
      </div>
      <div class="modal-body">
        <div class="container">
          <div id="printableArea11111">
            <h3 class="text-center order-title">{{ trans('admin_order.order') }}</h3>
            @if ($orders)
              <table class="info table">
                  <tr class="row m-0">
                      <td class="info-label col-md-3 col-sm-4 col-xs-6">{{ trans('admin_order.name') }}: </td>
                      <td class="col-md-9 col-sm-8 col-xs-6">{{ $orders->user->name }}</td>
                  </tr>
                  <tr class="row m-0">
                      <td class="info-label col-md-3 col-sm-4 col-xs-6">{{ $orders->user->email }}: </td>
                      <td class="col-md-9 col-sm-8 col-xs-6">{{ $orders->user->email }}</td>
                  </tr>
                  <tr class="row m-0">
                      <td class="info-label col-md-3 col-sm-4 col-xs-6">{{ $orders->user->phone }}: </td>
                      <td class="col-md-9 col-sm-8 col-xs-6">{{ $orders->user->phone }}</td>
                  </tr>
                  <tr class="row m-0">
                      <td class="info-label col-md-3 col-sm-4 col-xs-6">{{ trans('admin_order.address') }}:</td>
                      <td class="col-md-9 col-sm-8 col-xs-6">{{ $orders->user->address }}</td>
                  </tr>
              </table>
            @endif
            <table class="table table-striped">
                <tr class="detail-head row m-0" style="background-color: #44586d">
                    <th class="col-md-5 col-sm-4 text-center item">{{ trans('admin_order.food') }}</th>
                    <th class="col-md-2 col-sm-2 text-center quantity">{{ trans('admin_order.quantity') }}</th>
                    <th class="col-md-2 col-sm-2 text-right unit">{{ trans('admin_order.price') }}</th>
                    <th class="col-md-3 col-sm-2 text-right total">{{ trans('admin_order.total price (vnd)') }}</th>
                </tr>
                @if ($orders)
                  @foreach($orders->foodOrders as $order)
                    <tr class="row m-0">
                        <td class="col-md-5 col-sm-4 item">{{ $order->food->name }}</td>
                        <td class="col-md-2 col-sm-2 text-center quantity">{{ $order->quantity }}</td>
                        <td class="col-md-2 col-sm-2 text-right unit">{{ number_format($order->food->price) }}vnd</td>
                        <td class="col-md-3 col-sm-2 text-right total">{{ number_format($order->price) }}vnd</td>
                    </tr>
                  @endforeach
                @endif 
                <tr class="row m-0">
                    <td class="col-md-5 col-sm-4 item">{{ trans('admin_order.total') }}</td>
                    <td class="col-md-2 col-sm-2 text-center quantity"></td>
                    <td class="col-md-2 col-sm-2 text-right unit"></td>
                    <td class="col-md-3 col-sm-2 text-right total" style="font-size: 16px">{{ number_format($order->order->total_price) }}vnd</td>
                </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="float-right">
              <button class="btn btn-primary" id="printf"><i class="fa fa-print"></i>Print</button>
              <button class="btn btn-warning" data-dismiss="modal">Close</button>
          </div>
          <div class="span-80"></div>
      </div>
    </div>
  </div>
</div>
