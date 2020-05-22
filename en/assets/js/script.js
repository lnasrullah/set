// JavaScript Document

$(document ).ready(function(e) {
    $("*").has(".span1, .span2, .span3, .span4, .span5, .span6, .span7, .span8, .span9, .span10, .span11, .span12").each(
	function()
	{
		$(this).append("<div style=\"clear:both\"></div>");
	});
	
	$(".search").click(function()
	{
		if($(this).closest(".languagebar").find(".searchfield input:visible").length)
		{
			$(this).closest(".languagebar").find(".searchfield input").hide();
		}
		else
		{
			$(this).closest(".languagebar").find(".searchfield input").show();
		}
		
	});
	
	$(".slidecontainer img").load(function() {
	  // Handler for .load() called.
	  //$(this).css("height",$(this).find(".slidecontainer:first-child img").css("height"));
	  //alert($(this).css("height"));
	  $(this).parent().addClass("ready");
	  //$(this).find(".slidecontainer:first-child");
	});
	
	var slidetimer=setInterval(nextSlide,5000);
	
	var currentslide=0;
	
	function nextSlide()
	{
		if($(".slidecontainer").find(".slidecontent").eq(currentslide).hasClass("ready"))
		{
			$(".slidecontainer").find(".slidecontent").removeClass("active");
			$(".slidecontainer").find(".slidecontent").eq(currentslide).addClass("active");
			$(".slidecontainer").css("height",$(".slidecontainer").find(".slidecontent").eq(currentslide).css("height"));
		}
		currentslide=(currentslide+1)%$(".slidecontainer").find(".slidecontent").length;
	}
	
	$(".nextslide").click(function(event)
	{
		event.preventDefault();
		clearInterval(slidetimer);
		nextSlide();
		slidetimer=setInterval(nextSlide,5000);
	});
	
	$(".prevslide").click(function(event)
	{
		event.preventDefault();
		clearInterval(slidetimer);
		
		
		var index=$(".slidecontainer").find(".slidecontent.active").index();
		
		
		index--;
		if(index<0)
		{
			index=$(".slidecontainer").find(".slidecontent").length-1;
		}
		
		
		$(".slidecontainer").find(".slidecontent").removeClass("active");
		$(".slidecontainer").find(".slidecontent").eq(index).addClass("active");
		$(".slidecontainer").css("height",$(".slidecontainer").find(".slidecontent").eq(index).css("height"));
			
		slidetimer=setInterval(nextSlide,5000);
	});
	
	/*$(".partnercontainer").each(function()
	{
		var maxHeight = Math.max.apply(null, $(this).find(".partnercontent div").map(function ()
		{
			return $(this).height();
		}).get());;
		
		$(this).find(".partnercontent div").css("height",maxHeight+"px");
	});*/
	
	$(".partnercontainer .row").find(".partnercontent:gt(5)").hide();
	
	var firstcaro=0;
	
	$(".nextcaro").click(function(event)
	{
		firstcaro++;
		if(firstcaro>($(".partnercontainer .row").find(".partnercontent").length)/2-6)
		{
			firstcaro=0;
		}
		
		$(".partnercontainer .row").find(".partnercontent:lt("+(firstcaro+6)+")").show();
		$(".partnercontainer .row").find(".partnercontent:lt("+firstcaro+")").hide();
		$(".partnercontainer .row").find(".partnercontent:gt("+(firstcaro+5)+")").hide();
	});
	
	$(".prevcaro").click(function(event)
	{
		firstcaro--;
		if(firstcaro<0)
		{
			firstcaro=($(".partnercontainer .row").find(".partnercontent").length)/2-6;
		}
		
		$(".partnercontainer .row").find(".partnercontent:lt("+(firstcaro+6)+")").show();
		$(".partnercontainer .row").find(".partnercontent:lt("+firstcaro+")").hide();
		$(".partnercontainer .row").find(".partnercontent:gt("+(firstcaro+5)+")").hide();
	});
	
	/*$(".gallerythumb").each(function()
	{
		$(this).css("height",$(this).find("img").css("height"));
	});*/
	
	
	$("div.navigationmenu>ul>li:first-child>a").html("<i class=\"fa fa-home\" style=\"line-height:115px\"></i>");
	
	$("div.content table").each(function()
	{
		var $tablegroup=$("<div>",{class:"tablegroup"});
			
		$($tablegroup).insertBefore( $(this) );
		
		if($(this).hasClass("simplesearch"))
		{
			var $label=$("<label>",{class:"row"});
			$label.html("Keyword");
			
			var $field=$("<input>",{class:"row keyword", type:"text"});
			
			$tablegroup.append($label);
			$tablegroup.append($field);
		}
			
		$filter=$(this).find("th.filter");
		if($filter.length>0)
		{
			
			
			$filter.each(function()
			{
				var $label=$("<label>",{class:"row"});
				$label.html($(this).text());
				
				var $field=$("<input>",{class:"row filterfield", type:"text"});
				$field.attr("data-index",$(this).index());
				
				$tablegroup.append($label);
				$tablegroup.append($field);
				//$(this).text()
			});
			
			var $search=$("<a>",{class:"button searchfilter", href:"#"});
			$search.text("Search");
			var $reset=$("<a>",{class:"button resetfilter", href:"#"});
			$reset.text("All Clear");
			
			var $row=$("<div>",{class:"row"});
				
			$row.append($search);
			$row.append($reset);
			$tablegroup.append($row);
		}
		$tablegroup.append($(this));
	});
	
	$(".searchfilter").click(function(event)
	{
		event.preventDefault();
		
		$(this).closest(".tablegroup").find("tbody tr").show();
		
		var row=$(this).closest(".tablegroup").find("tbody tr");
		
		var fields=$(this).closest(".tablegroup").find("input[type=text].filterfield");
		
		row.each(function()
		{
			
			var rowpointer=$(this);
			rowpointer.hide();
			
			rowpointer.find("td").each(function()
			{
				if($(this).text().toLowerCase().indexOf($(this).closest(".tablegroup").find(".keyword").val().toLowerCase())>=0)
				{
					rowpointer.show();
					return false;
				}
			});
		});
		
		row.each(function()
		{
			if($(this).is(":visible"))
			{
				var rowpointer=$(this);
				fields.each(function()
				{
					var text=rowpointer.find("td").eq($(this).data("index")).text();
					if(text.toLowerCase().indexOf($(this).val().toLowerCase())<0)
					{
						rowpointer.hide();
						return false;
					}
				});
			}
		});
		
	});
	
	$(".resetfilter").click(function(event)
	{
		event.preventDefault();
		$(this).closest(".tablegroup").find("input[type=text]").val("");
		$(this).closest(".tablegroup").find("tbody tr").show();
	});
	
	$(".module-news").each(function()
	{
		$(this).children("h3").remove();
		$(this).find(".module-desc").append("<div class=\"module-more\">Read More</div>");
		$(this).find(".module-content").append("<div class=\"module-less\">Back</div>");
		
		
		var moduledetail=$(this).find(".module-detail");
		
		var newspanel;
		for(i=0;i<moduledetail.length;i++)
		{
			if(i%5==0)
			{
				newspanel=$("<div>",{class:"module-news-panel"});
			}
			newspanel.append(moduledetail.eq(i));
			if(i%5==1 || i==moduledetail.length-1 )
			{
				$(this).append(newspanel);
			}
		}
		
		pagenumber=$(this).find(".module-news-panel").length;
		
		var paging=$("<ul>",{class:"module-news-paging"});
		
		for(i=1;i<=pagenumber;i++)
		{
			paging.append("<li>"+i+"</li>");
		}
		
		$(this).append(paging);
		
		paging.find("li:first-child").addClass("active");
		
	});
	
	$(".module-news-paging li").click(function(event)
	{
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		$(this).closest(".module-news").find(".module-news-panel").hide();
		$(this).closest(".module-news").find(".module-news-panel").eq($(this).index()).show();
	});
	
	
	$(".module-news .module-more").click(function(event)
	{
		$(this).parent().hide();
		$(this).parent().siblings(".module-content").show();
		
		
		$(this).closest(".module-detail").siblings().hide();
		$(this).closest(".module-news").find(".module-news-paging").hide();
		
		$(".container").css("height","auto");
		$(".submenucontainer").css("height","auto");
		if($(".submenucontainer").height() < $(".container").height())
		{
			$(".submenucontainer").css("height",$(".container").css("height"));
		}
		else
		{
			$(".container").css("height",$(".submenucontainer").css("height"));
		}
	});
	
	$(".module-news .module-less").click(function(event)
	{
		$(this).parent().hide();
		$(this).parent().siblings(".module-desc").show();
		
		
		$(this).closest(".module-detail").siblings().show();
		$(this).closest(".module-news").find(".module-news-paging").show();
		
		$(".container").css("height","auto");
		$(".submenucontainer").css("height","auto");
		if($(".submenucontainer").height() < $(".container").height())
		{
			$(".submenucontainer").css("height",$(".container").css("height"));
		}
		else
		{
			$(".container").css("height",$(".submenucontainer").css("height"));
		}
	});
	
	$(".module-news .highlight").each(function(event)
	{
		$(this).find(".module-desc").hide();
		$(this).find(".module-content").show();
		
		
		$(this).siblings().hide();
		$(this).closest(".module-news").find(".module-news-paging").hide();
		
		$(this).closest(".module-news-panel").siblings().hide();
		$(this).closest(".module-news-panel").show();
		
		$(".module-news-paging li").removeClass("active");
		
		$(".module-news-paging li").eq($(this).closest(".module-news-panel").index()).addClass("active");
		
	});
	
	$(".module-gallery").each(function()
	{
		var $moduledetail=$(this).find(".module-detail");
		$moduledetail.addClass("span6");
		
		$moduledetail.find(".module-desc").remove();
		$moduledetail.find(".module-content").remove();
		
		
		$moduledetail.each(function()
		{
			var $row=$("<div>",{class:"row gallerythumb"});
			
			$row.append($(this).find("img"));
			$row.append($(this).find("h2"));
			
			$(this).append($row);
		});
		
		$(this).find(".module-detail").eq(0).prepend($(this).children("h3"));
		
		$(this).find(".module-detail").eq(0).show();
		
		$(this).append("<div class=\"module-less\">Back</div>");
		
	});
	
	$(".module-gallery .module-detail").click(function(event)
	{
		if(!$(this).parent().hasClass("active"))
		{
			$(this).parent().addClass("active");
			$(this).parent().siblings().removeClass("active");
			$(this).parent().siblings(".module-gallery").hide();
			$(this).find("h3").hide();
			$(this).siblings().show();
		}
		else
		{
			
		}
	});
	
	$(".module-gallery .module-less").click(function(event)
	{
		$(this).parent().removeClass("active");
		$(this).parent().siblings(".module-gallery").show();
		$(this).parent().find(".module-detail").find("h3").show();
		$(this).parent().find(".module-detail").hide();
		$(this).parent().find(".module-detail").eq(0).show();
	});
	
	$(".expandable caption").prepend("<i class=\"fa fa-plus\"></i><i class=\"fa fa-minus\"></i>");
	
	$(".expandable caption").click(function()
	{
		if($(this).closest("table").hasClass("open"))
		{
			$(this).closest("table").removeClass("open");
		}
		else
		{
			$(this).closest("table").addClass("open");
		}
		
		$(".container").css("height","auto");
		$(".submenucontainer").css("height","auto");
		if($(".submenucontainer").height() < $(".container").height())
		{
			$(".submenucontainer").css("height",$(".container").css("height"));
		}
		else
		{
			$(".container").css("height",$(".submenucontainer").css("height"));
		}
	});
	
	if($(".submenucontainer").height() < $(".container").height())
	{
		$(".submenucontainer").css("height",$(".container").css("height"));
	}
	else
	{
		$(".container").css("height",$(".submenucontainer").css("height"));
	}
	
	if($(".contact-form").height() < $(".contact-content").height())
	{
		$(".contact-form").css("height",$(".contact-content").css("height"));
	}
	else
	{
		$(".contact-content").css("height",$(".contact-form").css("height"));
	}
	
	
});