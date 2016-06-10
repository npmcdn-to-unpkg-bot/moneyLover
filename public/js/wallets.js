$(".choose-category").hide();

$('.categoriesGroup').click(function() {
	$(".choose-category").show();
	document.getElementById("group").disabled = true;
	$("#dialog").hide();
});

$('.close').click(function() {
	$(".choose-category").hide();
	$("#dialog").show();
	document.getElementById("group").disabled = false;
});

function chooseCategory(category) {
	$(".choose-category").hide();
	$("#dialog").show();
	document.getElementById("group").disabled = false;
	$(".group-icon").attr("src", category.defaultLink+"/"+category.icon);
	$(".categoriesGroup").attr("value", category.name);
	$(".categoriesGroups").attr("value", category.id);
	$(".typeGroup").attr("value", category.type)
};

