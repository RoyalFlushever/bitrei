<link rel="stylesheet" href="/js/ionrangeslider/css/ion.rangeSlider.css" />
<link rel="stylesheet" href="/js/ionrangeslider/css/ion.rangeSlider.skinFlat.css" id="skinCss" />
<div class="row">
<div class="column large-4">
<h3 class="section-title filters-title">Adjustable Assumptions</h3>
<table>
<tr>
<td>
Bits to Invest <br/>
<input id="calculator-slider-bits-to-invest">
</td>
</tr>
<tr><td>

<select id="calculator-rent-value-type" class="calculator-rent-value-type" style="display:inline-block;width:250px;border-color:#dadbde;border-radius:4px;height:28px;padding-top:0;padding-bottom:0;color:#8c95a7;">
	<option value="1" selected>Current Rent Value</option>
	<option value="2">Market Rent Value</option>
</select>
<br/><input id="calculator-slider-current-rent">
</td></tr>


<tr><td>Rent Change <br/><input id="calculator-slider-rent-change"></td></tr>
<tr><td>Vacancy rate <br/><input id="calculator-slider-vacancy-rate"></td></tr>
<tr><td>Property Management Fees <br/>10%</td></tr>
<tr><td>Operations and Maintenance <br/><input id="calculator-slider-maintenance"></td></tr>
<tr><td>Property Taxes <br/><input id="calculator-slider-taxes"></td></tr>
<tr><td>Insurance <br/><input id="calculator-slider-insurance"></td></tr>
<tr><td>Capital Expenditures <br/><input id="calculator-slider-catex"></td></tr>
<tr><td>Appreciation - projected first year <br/><input id="calculator-slider-appreciation-first"></td></tr>
<tr><td>Appreciation - projected 5 year <br/><input id="calculator-slider-appreciation"></td></tr>
<tr><td>Property Value <br/><div id="calculator-slider-property-value" data-price="<?= $property_data['property_item']->property_price ?>">$<?= number_format((float)$property_data['property_item']->property_price, 0, '.', ',') ?></div></td></tr>
</table>
	  
</div>	  
	  
<div class="column large-8">	 
<h3 class="section-title filters-title">Revenue </h3>
<div class="table-responsive">
<table>

	<!-- section /* -->
	<tr style="font-weight:bold;">
		<td width="130px;"></td>
		<td>Initial Year</td>
		<td>Year 1</td>
		<td>Year 2</td>
		<td>Year 3</td>
		<td>Year 4</td>
		<td>Year 5</td>
	</tr>

	<tr>
		<td  style="font-weight:bold;">Gross Rent </td>
		<td><div id="calculator-value-gross-rent-0"></div></td>
		<td><div id="calculator-value-gross-rent-1"></div></td>
		<td><div id="calculator-value-gross-rent-2"></div></td>
		<td><div id="calculator-value-gross-rent-3"></div></td>
		<td><div id="calculator-value-gross-rent-4"></div></td>
		<td><div id="calculator-value-gross-rent-5"></div></td>
	</tr>
	
	<tr>
		<td style="font-weight:bold;">Vacancy </td>
		<td><div id="calculator-value-vacancy-factor-0"></div></td>
		<td><div id="calculator-value-vacancy-factor-1"></div></td>
		<td><div id="calculator-value-vacancy-factor-2"></div></td>
		<td><div id="calculator-value-vacancy-factor-3"></div></td>
		<td><div id="calculator-value-vacancy-factor-4"></div></td>
		<td><div id="calculator-value-vacancy-factor-5"></div></td>
	</tr>

	<tr>
		<td style="font-weight:bold;">Net Rent </td>
		<td><div id="calculator-value-expected-rent-0"></div></td>
		<td><div id="calculator-value-expected-rent-1"></div></td>
		<td><div id="calculator-value-expected-rent-2"></div></td>
		<td><div id="calculator-value-expected-rent-3"></div></td>
		<td><div id="calculator-value-expected-rent-4"></div></td>
		<td><div id="calculator-value-expected-rent-5"></div></td>
	</tr>

	<!-- */ section -->
</table>
</div>
<h3 class="section-title filters-title">Operating Expense</h3>
<div class="table-responsive">
<table>
	
	<!-- section /* -->
	
	<tr style="font-weight:bold;">
		<td width="130px;"></td>
		<td>Initial Year</td>
		<td>Year 1</td>
		<td>Year 2</td>
		<td>Year 3</td>
		<td>Year 4</td>
		<td>Year 5</td>
	</tr>

	<tr>
		<td style="font-weight:bold;">Property Management </td>
		<td><div id="calculator-value-property-management-0"></div></td>
		<td><div id="calculator-value-property-management-1"></div></td>
		<td><div id="calculator-value-property-management-2"></div></td>
		<td><div id="calculator-value-property-management-3"></div></td>
		<td><div id="calculator-value-property-management-4"></div></td>
		<td><div id="calculator-value-property-management-5"></div></td>
	</tr>

	<tr>
		<td style="font-weight:bold;">Operations & Maintenance </td>
		<td><div id="calculator-value-maintenance-0"></div></td>
		<td><div id="calculator-value-maintenance-1"></div></td>
		<td><div id="calculator-value-maintenance-2"></div></td>
		<td><div id="calculator-value-maintenance-3"></div></td>
		<td><div id="calculator-value-maintenance-4"></div></td>
		<td><div id="calculator-value-maintenance-5"></div></td>
	</tr>

	<tr>
		<td style="font-weight:bold;">Taxes </td>
		<td><div id="calculator-value-taxes-0"></div></td>
		<td><div id="calculator-value-taxes-1"></div></td>
		<td><div id="calculator-value-taxes-2"></div></td>
		<td><div id="calculator-value-taxes-3"></div></td>
		<td><div id="calculator-value-taxes-4"></div></td>
		<td><div id="calculator-value-taxes-5"></div></td>
	</tr>


	<tr>
		<td style="font-weight:bold;">Insurance </td>
		<td><div id="calculator-value-insurance-0"></div></td>
		<td><div id="calculator-value-insurance-1"></div></td>
		<td><div id="calculator-value-insurance-2"></div></td>
		<td><div id="calculator-value-insurance-3"></div></td>
		<td><div id="calculator-value-insurance-4"></div></td>
		<td><div id="calculator-value-insurance-5"></div></td>
	</tr>


	<tr>
		<td style="font-weight:bold;">Capital Expenditures </td>
		<td><div id="calculator-value-capital-expenditures-0"></div></td>
		<td><div id="calculator-value-capital-expenditures-1"></div></td>
		<td><div id="calculator-value-capital-expenditures-2"></div></td>
		<td><div id="calculator-value-capital-expenditures-3"></div></td>
		<td><div id="calculator-value-capital-expenditures-4"></div></td>
		<td><div id="calculator-value-capital-expenditures-5"></div></td>
	</tr>


	<tr>
		<td style="font-weight:bold;">NOI </td>
		<td><div id="calculator-value-total-expenses-0"></div></td>
		<td><div id="calculator-value-total-expenses-1"></div></td>
		<td><div id="calculator-value-total-expenses-2"></div></td>
		<td><div id="calculator-value-total-expenses-3"></div></td>
		<td><div id="calculator-value-total-expenses-4"></div></td>
		<td><div id="calculator-value-total-expenses-5"></div></td>
	</tr>


	<tr>
		<td style="font-weight:bold;">Total Operating Cash Flow </td>
		<td><div id="calculator-value-cash-flow-0"></div></td>
		<td><div id="calculator-value-cash-flow-1"></div></td>
		<td><div id="calculator-value-cash-flow-2"></div></td>
		<td><div id="calculator-value-cash-flow-3"></div></td>
		<td><div id="calculator-value-cash-flow-4"></div></td>
		<td><div id="calculator-value-cash-flow-5"></div></td>
	</tr>
	
	<tr>
		<td style="font-weight:bold;">Your Estimated Cash Earnings (Annual) </td>
		<td><div id="calculator-value-cash-earnings-0"></div></td>
		<td><div id="calculator-value-cash-earnings-1"></div></td>
		<td><div id="calculator-value-cash-earnings-2"></div></td>
		<td><div id="calculator-value-cash-earnings-3"></div></td>
		<td><div id="calculator-value-cash-earnings-4"></div></td>
		<td><div id="calculator-value-cash-earnings-5"></div></td>
	</tr>
    
    <tr>
		<td style="font-weight:bold;">Your Estimated Cash Earnings (Quarterly) </td>
		<td><div id="calculator-value-cash-earnings-quarterly-0"></div></td>
		<td><div id="calculator-value-cash-earnings-quarterly-1"></div></td>
		<td><div id="calculator-value-cash-earnings-quarterly-2"></div></td>
		<td><div id="calculator-value-cash-earnings-quarterly-3"></div></td>
		<td><div id="calculator-value-cash-earnings-quarterly-4"></div></td>
		<td><div id="calculator-value-cash-earnings-quarterly-5"></div></td>
	</tr>
	<!-- */ section -->
	</table>
    
    <h3 class="section-title filters-title">Asset Value</h3>
    <div class="table-responsive">
    <table>
	<!-- section /* -->
	
	<tr style="font-weight:bold;">
		<td width="130px;"></td>
		<td>Initial Year</td>
		<td>Year 1</td>
		<td>Year 2</td>
		<td>Year 3</td>
		<td>Year 4</td>
		<td>Year 5</td>
	</tr>

	
	<tr>
		<td style="font-weight:bold;">Property Value </td>
		<td><div id="calculator-value-property-value-0"></div></td>
		<td><div id="calculator-value-property-value-1"></div></td>
		<td><div id="calculator-value-property-value-2"></div></td>
		<td><div id="calculator-value-property-value-3"></div></td>
		<td><div id="calculator-value-property-value-4"></div></td>
		<td><div id="calculator-value-property-value-5"></div></td>
	</tr>

	<tr>
		<td style="font-weight:bold;">Your Asset Value </td>
		<td><div id="calculator-value-asset-value-0"></div></td>
		<td><div id="calculator-value-asset-value-1"></div></td>
		<td><div id="calculator-value-asset-value-2"></div></td>
		<td><div id="calculator-value-asset-value-3"></div></td>
		<td><div id="calculator-value-asset-value-4"></div></td>
		<td><div id="calculator-value-asset-value-5"></div></td>
	</tr>

</table>	
</div>

<h3 class="section-title filters-title">Total Asset Return</h3>
    <div class="table-responsive">
    <table>
	<!-- section /* -->
	
	<tr style="font-weight:bold;">
		<td width="130px;"></td>
		<td>Initial Year</td>
		<td>Year 1</td>
		<td>Year 2</td>
		<td>Year 3</td>
		<td>Year 4</td>
		<td>Year 5</td>
	</tr>

	
	<tr>
		<td style="font-weight:bold;">Cash Yield </td>
		<td><div id="calculator-value-cash-yield-0"></div></td>
		<td><div id="calculator-value-cash-yield-1"></div></td>
		<td><div id="calculator-value-cash-yield-2"></div></td>
		<td><div id="calculator-value-cash-yield-3"></div></td>
		<td><div id="calculator-value-cash-yield-4"></div></td>
		<td><div id="calculator-value-cash-yield-5"></div></td>
	</tr>

	<tr>
		<td style="font-weight:bold;">Growth In Asset Value </td>
		<td><div id="calculator-value-asset-growth-0"></div></td>
		<td><div id="calculator-value-asset-growth-1"></div></td>
		<td><div id="calculator-value-asset-growth-2"></div></td>
		<td><div id="calculator-value-asset-growth-3"></div></td>
		<td><div id="calculator-value-asset-growth-4"></div></td>
		<td><div id="calculator-value-asset-growth-5"></div></td>
	</tr>
    
    <tr>
		<td style="font-weight:bold;">Total ROI </td>
		<td><div id="calculator-value-total-roi-0"></div></td>
		<td><div id="calculator-value-total-roi-1"></div></td>
		<td><div id="calculator-value-total-roi-2"></div></td>
		<td><div id="calculator-value-total-roi-3"></div></td>
		<td><div id="calculator-value-total-roi-4"></div></td>
		<td><div id="calculator-value-total-roi-5"></div></td>
	</tr>

</table>	


</div>
</div>

</div>
</div>
	  
	  
	  