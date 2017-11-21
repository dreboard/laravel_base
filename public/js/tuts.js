$( document ).ready(function() {
	var tutorial = function () {

		console.log('Ready');

		return {

			setTestText : function () {
				$('#testPara').text('Test More Text');
			},
			getFullName : function () {
				return '';
			}
		};
	}(this.setTestText);

	//$('#testPara').text('Test Text');
	/*var obj_analytics = function () {
		return {
			platinum_body: document.getElementsByClassName("platinum"),
			events_div: document.getElementById("events_div"),
			ANALYTICS_OBJ_OK: 0,
			ANALYTICS_OBJ_ERROR: 1,
			ANALYTICS_USER_IP: toInt(window.USER_IP_ADD),
			ANALYTICS_METRIC_1: is_touch_metric(),
			ANALYTICS_METRIC_2: 2,
			ANALYTICS_METRIC_3: 1,
			ANALYTICS_METRIC_0: 0,
			INVALID_ANALYTICS_MSG: "Google analytics object undefined",
			ANALYTICS_NO_EVENT_MSG: "Google analytics EVENT NOT SENT",
			ANALYTICS_NO_PAGEVIEW_MSG: "Google analytics PAGEVIEW NOT SENT",
			ANALYTICS_NO_VALIDATION_MSG: "Google analytics VALIDATION NOT SENT",
			ANALYTICS_MSG_USER_SUCCESS: "User Successful Live Check",
			ANALYTICS_MSG_GROUP_SUCCESS: "Group Successful Live Check",
			ANALYTICS_MSG_USER_FAIL: "User Failed Errors",
			ANALYTICS_MSG_USER_LIVE_FAIL: "User Failed Live Check",
			ANALYTICS_MSG_GROUP_LIVE_FAIL: "Group Failed Live Check",
			pathName: window.location.pathname,
			debug: function () {
				if (window.console && console.log) return Function.prototype.bind.call(console.log, console)
			},
			error_func: function (e) {
				"development" === window.ENVIRONMENT && (this.debug(obj_analytics.error_func), console.trace(e), console.log(e))
			},
			analytics_exception_message: function (e) {
				"development" === window.ENVIRONMENT && (console.log(e.name), console.log(e.message))
			},
			send_event: function (e, n, t, a) {
				if (ga("send", "event", e, n, t, a, {nonInteraction: !0})) return !0;
				throw new Error(obj_analytics.ANALYTICS_NO_EVENT_MSG)
			},
			send_pageview: function (e) {
				if (!e) throw new Error(obj_analytics.ANALYTICS_NO_PAGEVIEW_MSG);
				ga("set", e, clientId), ga("send", "pageview")
			},
			send_validation_event: function (e, n, t, a) {
				if (ga("send", "event", e, n, t, a, {nonInteraction: !0})) return !0;
				throw new Error(obj_analytics.ANALYTICS_NO_VALIDATION_MSG)
			}
		}
	}();*/
});

