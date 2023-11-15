/** @type {import('tailwindcss').Config} */
module.exports = {
	content: [
		"./system/themes/**/**/*.{html,js,css,tpl}",
		"./system/themes/**/**/**/*.{html,js,css,tpl}",
		"./node_modules/flowbite/**/*.js",
	],
	theme: {
		extend: {},
	},
	plugins: [require("flowbite/plugin")],
}
