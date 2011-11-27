function {
	var content = $('#content');
	var footer = $('#footer');
	var leftpanel = $('#leftpanel');
	var rightpanel = $('#rightpanel');
	var center = $('#center');
	var height1 = center.style.height;
	var height2 = leftpanel.style.height;
	var height3 = rightpanel.style.height;
	var height = max(height1, max(height2, height3));
	content.style.minHeight = height;
	center.style.minHeight = height;
	rightpanel.style.minHeight = height;
	leftpanel.style.minHeight = height;
}
