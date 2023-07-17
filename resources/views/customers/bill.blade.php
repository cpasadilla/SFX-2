@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/bl.css') }}" />

<body>
  <div class="buttons-container">
      <button id="save">Save</button>
      <button id="print">Print</button>
  </div>
  <a id="save_to_image">
      <div class="bl-container">
          <table cellpadding="0" cellspacing="0">
              <tr class="top">
                  <td colspan="2">
                      <table>
                          <tr>
                              <td class="title">
                                  <img
                                      src="{{ asset('images/bill.png') }}"
                                      style="width: 100%; max-width: 500px"
                                  />
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>     
          </table>
          <p style="text-align: center;">
              National Road Brgy. Kaychanrianan Basco Batanes<br />
              Cellphone Nos.: 0908-815-9300 / 0999-889-5848 / 0999-889-5849<br />
              Email Address: <a href="mailto:fxavier_2015@yahoo.com.ph">fxavier_2015@yahoo.com.ph</a>
          </p>

          <p style="text-align: center;">
              &nbsp;
          </p>
          <p style="text-align: center;">
              <strong>BILL OF LADING</strong>
          </p>
          <p style="text-align: center;">
              &nbsp;
          </p>
          <p style="text-align: justify;">
              M/V EVERWIN STAR _______________ VOYAGE NO.__CONTAINER NO. ________ BL NO. _______________<br />
              ORIGIN: ____________________________ DESTINATION: _________________ DATE: ___________________<br />
              <br />
              <br />
              SHIPPER: __________________________________ CONSIGNEE: ____________________________________<br />
              ADDRESS: __________________________________  ADDRESS: _____________________________________<br />
              <br/>
          </p>
<table style="height: 204px; width: 96.523%; border-collapse: collapse; border-style: none;" border="1">
<tbody>
<tr style="height: 18px;">
<td style="width: 13%; height: 18px; text-align: center;">QTY</td>
<td style="width: 13%; height: 18px; text-align: center;">UNIT</td>
<td style="width: 28%; height: 18px; text-align: center;">DESCRIPTION</td>
<td style="width: 15%; height: 18px; text-align: center;">VALUE</td>
<td style="width: 15%; height: 18px; text-align: center;">WEIGHT</td>
<td style="width: 15%; height: 18px; text-align: center;">MEASUREMENT</td>
<td style="width: 13%; height: 18px; text-align: center;">RATE</td>
<td style="width: 18%; height: 18px; text-align: center;">FREIGHT</td>
</tr>
<tr style="height: 169px;">
<td style="width: 13%; height: 186px;" rowspan="2">&nbsp; JOEY</td>
<td style="width: 13%; height: 186px;" rowspan="2">&nbsp; 2</td>
<td style="width: 73%; height: 186px;" colspan="4" rowspan="2">&nbsp; hello</td>
<td style="width: 13%; height: 169px;" rowspan="2">₱100</td>
<td style="width: 18%; height: 186px;" rowspan="2">&nbsp; yelo</td>
</tr>
</tbody>
</table>
<p><strong>Terms and Conditions:</strong></p>
<ol>
<li>We are not responsible for losses and damages due to improper packing.</li>
<li>Claims on cargo losses and / or damages must be filed within 5 (five) days after unloading.</li>
<li>Unclaimed cargoes shall be considered forfeited after 30 (thirty) days upon unloading.</li>
</ol>
<p>&nbsp;</p>
              <div class="e67_556" > 
                  Freight:<hr class="line">
                  
                  Valuation:<hr class="line">
                  
                  Wharfage:<hr class="line">
                  
                  VAT:<hr class="line">
                  
                  Other Charges:<hr class="line">
                  
                  Stuffing/Stippings:<hr class="line">
                  
                  TOTAL:<hr class="line">
                  
              </div>
              
              <div  class="e67_557">
                  Received on board vessel in apparent good condition.</div>
                  <br>
                  <br>
                  <span  class="e67_558">
                      <hr class="longline">
                   </span>
                   <br>
              <span  class="e67_559">
                  Vessel’s Checker or Authorized Representative</span>
      </div>
  </a>

</body>
<script src="{{ asset('js/html2canvas.js') }}"></script>
<script src="{{ asset('js/index.js') }}"></script>


@endsection