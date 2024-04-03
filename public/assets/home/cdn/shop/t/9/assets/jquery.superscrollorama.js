(function($){$.superscrollorama=function(options){var superscrollorama={},defaults={isVertical:!0,triggerAtCenter:!0,playoutAnimations:!0,reverse:!0};superscrollorama.settings=$.extend({},defaults,options);var $window=$(window),animObjects=[],pinnedObjects=[],scrollContainerOffset={x:0,y:0},doUpdateOnNextTick=!1,targetOffset,i;function init(){$window.scroll(function(){doUpdateOnNextTick=!0}),TweenLite.ticker.addEventListener("tick",tickHandler)}function cssNumericPosition($elem){var obj={top:parseFloat($elem.css("top")),left:parseFloat($elem.css("left"))};return isNaN(obj.top)&&(obj.top=0),isNaN(obj.left)&&(obj.left=0),obj}function tickHandler(){doUpdateOnNextTick&&(checkScrollAnim(),doUpdateOnNextTick=!1)}function resetPinObj(pinObj){pinObj.el.css("position",pinObj.origPositioning.pos),pinObj.el.css("top",pinObj.origPositioning.top),pinObj.el.css("left",pinObj.origPositioning.left)}function setTweenProgress(tween,progress){tween&&(tween.totalProgress?tween.totalProgress(progress).pause():tween.progress(progress).pause())}function checkScrollAnim(){var currScrollPoint=superscrollorama.settings.isVertical?$window.scrollTop()+scrollContainerOffset.y:$window.scrollLeft()+scrollContainerOffset.x,offsetAdjust=superscrollorama.settings.triggerAtCenter?superscrollorama.settings.isVertical?-$window.height()/2:-$window.width()/2:0,i2,startPoint,endPoint,numAnim=animObjects.length;for(i2=0;i2<numAnim;i2++){var animObj=animObjects[i2],target=animObj.target,offset=animObj.offset;if(typeof target=="string"?(targetOffset=$(target).offset()||{},startPoint=superscrollorama.settings.isVertical?targetOffset.top+scrollContainerOffset.y:targetOffset.left+scrollContainerOffset.x,offset+=offsetAdjust):typeof target=="number"?startPoint=target:$.isFunction(target)?startPoint=target.call(this):(targetOffset=target.offset(),startPoint=superscrollorama.settings.isVertical?targetOffset.top+scrollContainerOffset.y:targetOffset.left+scrollContainerOffset.x,offset+=offsetAdjust),startPoint+=offset,endPoint=startPoint+animObj.dur,currScrollPoint>startPoint&&currScrollPoint<endPoint&&animObj.state!=="TWEENING"&&(animObj.state="TWEENING",animObj.start=startPoint,animObj.end=endPoint),currScrollPoint<startPoint&&animObj.state!=="BEFORE"&&animObj.reverse)superscrollorama.settings.playoutAnimations||animObj.dur===0?animObj.tween.reverse():setTweenProgress(animObj.tween,0),animObj.state="BEFORE";else if(currScrollPoint>endPoint&&animObj.state!=="AFTER")superscrollorama.settings.playoutAnimations||animObj.dur===0?animObj.tween.play():setTweenProgress(animObj.tween,1),animObj.state="AFTER";else if(animObj.state==="TWEENING"){var repeatIndefinitely=!1;if(animObj.tween.repeat&&(repeatIndefinitely=animObj.tween.repeat()===-1),repeatIndefinitely){var playheadPosition=animObj.tween.totalProgress();(animObj.playeadLastPosition===null||playheadPosition===animObj.playeadLastPosition)&&(playheadPosition===1?animObj.tween.yoyo()?animObj.tween.reverse():animObj.tween.totalProgress(0).play():animObj.tween.play()),animObj.playeadLastPosition=playheadPosition}else setTweenProgress(animObj.tween,(currScrollPoint-animObj.start)/(animObj.end-animObj.start))}}var numPinned=pinnedObjects.length;for(i2=0;i2<numPinned;i2++){var pinObj=pinnedObjects[i2],el=pinObj.el;if(pinObj.state!=="PINNED"){var pinObjSpacerOffset=pinObj.spacer.offset();pinObj.state==="UPDATE"&&resetPinObj(pinObj),startPoint=superscrollorama.settings.isVertical?pinObjSpacerOffset.top+scrollContainerOffset.y:pinObjSpacerOffset.left+scrollContainerOffset.x,startPoint+=pinObj.offset,endPoint=startPoint+pinObj.dur;var jumpedPast=currScrollPoint>endPoint&&pinObj.state==="BEFORE"||currScrollPoint<startPoint&&pinObj.state==="AFTER",inPinAra=currScrollPoint>startPoint&&currScrollPoint<endPoint;(inPinAra||jumpedPast)&&(pinObj.pushFollowers&&el.css("position")==="static"&&el.css("position","relative"),pinObj.origPositioning={pos:el.css("position"),top:pinObj.spacer.css("top"),left:pinObj.spacer.css("left")},pinObj.fixedPositioning={top:superscrollorama.settings.isVertical?-pinObj.offset:pinObjSpacerOffset.top,left:superscrollorama.settings.isVertical?pinObjSpacerOffset.left:-pinObj.offset},el.css("position","fixed"),el.css("will-change","top"),el.css("top",pinObj.fixedPositioning.top),el.css("left",pinObj.fixedPositioning.left),pinObj.pinStart=startPoint,pinObj.pinEnd=endPoint,pinObj.pushFollowers?superscrollorama.settings.isVertical?pinObj.spacer.height(pinObj.dur+el.outerHeight(!0)):pinObj.spacer.width(pinObj.dur+el.outerWidth(!0)):pinObj.origPositioning.pos==="absolute"?(pinObj.spacer.width(0),pinObj.spacer.height(0)):superscrollorama.settings.isVertical?pinObj.spacer.height(el.outerHeight(!0)):pinObj.spacer.width(el.outerWidth(!0)),pinObj.state==="UPDATE"?pinObj.anim&&setTweenProgress(pinObj.anim,0):pinObj.onPin&&pinObj.onPin(pinObj.state==="AFTER"),pinObj.state="PINNED")}if(pinObj.state==="PINNED")if(currScrollPoint<pinObj.pinStart||currScrollPoint>pinObj.pinEnd){var before=currScrollPoint<pinObj.pinStart;pinObj.state=before?"BEFORE":"AFTER",setTweenProgress(pinObj.anim,before?0:1);var spacerSize=before?0:pinObj.dur;superscrollorama.settings.isVertical?pinObj.spacer.height(pinObj.pushFollowers?spacerSize:0):pinObj.spacer.width(pinObj.pushFollowers?spacerSize:0);var deltay=pinObj.fixedPositioning.top-cssNumericPosition(pinObj.el).top,deltax=pinObj.fixedPositioning.left-cssNumericPosition(pinObj.el).left;if(resetPinObj(pinObj),!pinObj.pushFollowers||pinObj.origPositioning.pos==="absolute"){var pinOffset;pinObj.origPositioning.pos==="relative"?(pinOffset=superscrollorama.settings.isVertical?parseFloat(pinObj.origPositioning.top):parseFloat(pinObj.origPositioning.left),isNaN(pinOffset)&&(pinOffset=0)):pinOffset=superscrollorama.settings.isVertical?pinObj.spacer.position().top:pinObj.spacer.position().left;var direction=superscrollorama.settings.isVertical?"top":"left";pinObj.el.css(direction,pinOffset+spacerSize)}deltay!==0&&pinObj.el.css("top",cssNumericPosition(pinObj.el).top-deltay),deltax!==0&&pinObj.el.css("left",cssNumericPosition(pinObj.el).left-deltax),pinObj.onUnpin&&pinObj.onUnpin(!before)}else pinObj.anim&&setTweenProgress(pinObj.anim,(currScrollPoint-pinObj.pinStart)/(pinObj.pinEnd-pinObj.pinStart))}}return superscrollorama.addTween=function(target,tween,dur,offset,reverse){return tween.pause(),animObjects.push({target:target,tween:tween,offset:offset||0,dur:dur||0,reverse:typeof reverse!="undefined"?reverse:superscrollorama.settings.reverse,state:"BEFORE"}),superscrollorama},superscrollorama.pin=function(el,dur,vars){typeof el=="string"&&(el=$(el));var defaults2={offset:0,pushFollowers:!0};vars=$.extend({},defaults2,vars),vars.anim&&vars.anim.pause();var spacer=$('<div class="superscrollorama-pin-spacer"></div>');return spacer.css("position","relative"),spacer.css("top",el.css("top")),spacer.css("left",el.css("left")),el.before(spacer),pinnedObjects.push({el:el,state:"BEFORE",dur:dur,offset:vars.offset,anim:vars.anim,pushFollowers:vars.pushFollowers,spacer:spacer,onPin:vars.onPin,onUnpin:vars.onUnpin}),superscrollorama},superscrollorama.updatePin=function(el,dur,vars){typeof el=="string"&&(el=$(el)),vars.anim&&vars.anim.pause();var numPinned=pinnedObjects.length;for(i=0;i<numPinned;i++){var pinObj=pinnedObjects[i];el.get(0)===pinObj.el.get(0)&&(dur&&(pinObj.dur=dur),vars.anim&&(pinObj.anim=vars.anim),vars.offset&&(pinObj.offset=vars.offset),typeof vars.pushFollowers!="undefined"&&(pinObj.pushFollowers=vars.pushFollowers),vars.onPin&&(pinObj.onPin=vars.onPin),vars.onUnpin&&(pinObj.onUnpin=vars.onUnpin),(dur||vars.anim||vars.offset)&&pinObj.state==="PINNED"&&(pinObj.state="UPDATE",checkScrollAnim()))}return superscrollorama},superscrollorama.removeTween=function(target,tween,reset){var count=animObjects.length;typeof reset=="undefined"&&(reset=!0);for(var index=0;index<count;index++){var value=animObjects[index];value.target===target&&(!tween||value.tween===tween)&&(animObjects.splice(index,1),reset&&setTweenProgress(value.tween,0),count--,index--)}return superscrollorama},superscrollorama.removePin=function(el,reset){typeof el=="string"&&(el=$(el)),typeof reset=="undefined"&&(reset=!0);for(var count=pinnedObjects.length,index=0;index<count;index++){var value=pinnedObjects[index];value.el.is(el)&&(pinnedObjects.splice(index,1),reset&&(value.spacer.remove(),resetPinObj(value),value.anim&&setTweenProgress(value.anim,0)),count--,index--)}return superscrollorama},superscrollorama.setScrollContainerOffset=function(x,y){return scrollContainerOffset.x=x,scrollContainerOffset.y=y,superscrollorama},superscrollorama.triggerCheckAnim=function(immediately){return immediately?checkScrollAnim():doUpdateOnNextTick=!0,superscrollorama},init(),superscrollorama}})(jQuery);
//# sourceMappingURL=/cdn/shop/t/9/assets/jquery.superscrollorama.js.map?v=18040553548099191701552289318