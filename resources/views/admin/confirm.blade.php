Hello, {{$receiver_name}}
<p>
	We had accepting your book in Tenant Management System</a> at {{$date}}
</p>
<p>
	For the next step, we provide a payment form.
</p>

<p> Here, what will you pay in :
</p>
<div class="form-group">
                    <div class="col-xs-12">
                      <p class="lead">Payment Detail</p>
                      <div class="table-responsive">
                        <table class="table">
                        <?php
                        $total = $order + $package;
                        $prnt = $total/10;
                        $max = $prnt + $total
                        
                        ?>                          
                          <tr>
                            <th style="width:50%">Room Price</th>
                            <td>Rp {{number_format($order,0,",",",")}}</td>
                          </tr>
                          <tr>
                            <th>Package Price</th>
                            <td>Rp {{number_format($package,0,",",",")}}</td>
                          </tr>
                          <tr>
                            <th>Tax (10%)</th>
                            <td>Rp {{number_format($prnt,0,",",",")}}</td>
                          </tr>
                          <tr>
                            <th>Total:</th>
                            <td>Rp {{number_format($max,0,",",",")}}</td>
                          </tr>
                        </table>
                      </div>
                    </div><!-- /.col -->
                    </div>                                                  
<p>
	Please click the link below :
</p>
<p>
	http://110.232.89.67//tenantms/payment/{{$id}}
</p>
<p>Use number to fill the code payment : {{$code}}</p>
<p><p></p>
	For the payment with transfer, we provide some bank account
</p>
<p>
	You can do payment with this bill number :
</p>
<p></p>
<p>Bank BCA Semarang</p>
<p>No. Rekening: 8165103030</p>
<p>In The Name of    : Sayid Munawar</p>
<p></p><p></p>
<p>Bank BCA Yogyakarta</p>
<p>No. Rekening: 037-2212-711</p>
<p>In The Name of    : Sayid Munawar</p>
<p></p><p></p>
<p>Bank Mandiri Yogyakarta</p>
<p>No. Rekening: 1370004503344</p>
<p>In The Name of    : Sayid Munawar</p>
<p></p><p></p>
<p>Bank BNI Yogyakarta</p>
<p>No. Rekening: 0122314497</p>
<p>In The Name of    : Sayid Munawar</p>