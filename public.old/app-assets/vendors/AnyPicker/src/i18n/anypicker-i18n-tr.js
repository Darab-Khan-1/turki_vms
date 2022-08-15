/* ----------------------------------------------------------------------------- 

  AnyPicker - Customizable Picker for Mobile OS
  Version 2.0.9
  Copyright (c)2017 Lajpat Shah
  Contributors : https://github.com/nehakadam/AnyPicker/contributors
  Repository : https://github.com/nehakadam/AnyPicker
  Homepage : https://nehakadam.github.io/AnyPicker

 ----------------------------------------------------------------------------- */

/*

	language: English
	file: AnyPicker-i18n-tr

*/

(function ($) {
    $.AnyPicker.i18n["tr"] = $.extend($.AnyPicker.i18n["tr"], {

    	// Common

    	headerTitle: "Seçiniz",
		setButton: "Seç",
		clearButton: "Temizle",
		nowButton: "Şimdi",
		cancelButton: "Kapat",
		dateSwitch: "Tarih",
		timeSwitch: "Saat",

    	// DateTime

        veryShortDays: "Pt_Sa_Ça_Pe_Cu_Ct_Pz".split("_"),
		shortDays: "Paz_Sal_Çar_Per_Cum_Cts_Pzr".split("_"),
		fullDays: "Pazartesi_Salı_Çarşamba_Perşembe_Cuma_Cumartesi_Pazar".split("_"),
		shortMonths: "Oca_Şub_Mar_Nis_May_Haz_Tem_Ağu_Eyl_Eki_Kas_Ara".split("_"),
		fullMonths: "Ocak_Şubat_Mart_Nisan_Mayıs_Haziran_Temmuz_Ağustos_Eylül_Ekim_Kasım_Aralık".split("_"),
		numbers: "0_1_2_3_4_5_6_7_8_9".split("_"),
		meridiem: 
		{
			a: ["a", "p"],
			aa: ["am", "pm"],
			A: ["A", "P"],
			AA: ["AM", "PM"]
		},
		componentLabels: {
			date: "Tarih",
			day: "Gün",
			month: "Ay",
			year: "Yıl",
			hours: "Saat",
			minutes: "Dakika",
			seconds: "Saniye",
			meridiem: "Salise"
		}
	
    });

})(jQuery);