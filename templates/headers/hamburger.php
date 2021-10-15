<div class="hamburger" x-data="{ open : false }" @click="() => { open = !open; $dispatch('hamburger', open) }">
	<svg xmlns='http://www.w3.org/2000/svg'
	     width='30'
	     height='30'
	     viewBox='0 0 512 512'
         stroke="#CFA075"
	     class="hamburger-icon lg:hidden"
	     x-show="!open">
		<line x1='80' y1='160' x2='432' y2='160' style='stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/>
		<line x1='80' y1='256' x2='432' y2='256' style='stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/>
		<line x1='80' y1='352' x2='432' y2='352' style='stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px'/>
	</svg>
	<svg xmlns='http://www.w3.org/2000/svg'
	     width='30'
	     height='30'
	     viewBox='0 0 512 512'
         stroke="#CFA075"
	     class="hamburger-close"
	     x-show="open">
		<line x1='368' y1='368' x2='144' y2='144' style='stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/>
		<line x1='368' y1='144' x2='144' y2='368' style='stroke-linecap:round;stroke-linejoin:round;stroke-width:32px'/>
	</svg>
</div>
