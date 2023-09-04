import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography' 

export default {
    content: ['./resources/**/*.blade.php', './vendor/filament/**/*.blade.php'],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.blue,
                success: colors.green,
                warning: colors.yellow,
                mainBg: "#f38e06",
                processing:'#f0b758',
                completed:"#1ec762",
                pending:'#1444c6'
            },
        },
    },
    plugins: [
        forms, 
        typography, 
    ],
}
