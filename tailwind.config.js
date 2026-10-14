let durationButtonSlide = '500ms'

module.exports = {
  purge: ['./src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
        'referenz' : ['ReferenzGrotesk-Medium'],
    },
    screens: {
      md: {'max': '1000px'},
      sm: {'max': '800px'},
      'hover-hover': {'raw': '(hover: hover)'},
      'no-hover': {'raw': '(hover: none)'}
      },
    fontSize: {
      xl: ['max(29vw, 8rem)', {
        letterSpacing: '-0.07em',
        lineHeight: '0.8em',
      }],
      lg: ['max(6vw, 3rem)', {
        letterSpacing: '-0.055em',
        lineHeight: '0.8em',
      }],
      md: ['2.1rem', {
        letterSpacing: '-0.03em',
        lineHeight: '0.97em',
      }],
      sm: ['1.2rem', {
        letterSpacing: '-0.025em',
        lineHeight: '1.05em',
      }],
      'nav-sm': ['1.2rem', {
        letterSpacing: '-0.025em',
        lineHeight: '1.05em',
      }],
    },
    extend: {
       spacing: {
         '7' : '1.75rem',
         '5' : '1.25rem',
         '4.5' : '1.12rem',
         '13' : '3.25rem',
         'nav' : '2rem'
       },
       minWidth: {
         '1/4' : '25%'
       },
       maxHeight: {
         'image' : 'calc(100vh - 4.5rem)',
       },
       columns: {
         '3': '3',
       },
       borderWidth: {
         'aktuell' : '4px'
       },
       colors: {
          'secondary-color': '#3586FF',
          'primary-color': 'black',
          'custom' : 'var(--color)'
        },
       fontSize: {
         'lg-sm': ['10vw', {
           letterSpacing: '-0.05em',
           lineHeight: '0.95em',
         }],
         'md-sm': ['1.5rem', {
           letterSpacing: '-0.01em',
           lineHeight: '0.97em',
         }],
       },
       zIndex: {
        '-50': '-50',
       },
       animation: {
        'fade-in' : 'fadeIn 0.1s ease-in',
        'fade-out' : 'fadeOut 0.1s ease-out',
        'shrink' : `shrink 2000ms ease-out 1 forwards`,
      },
       keyframes: {
         fadeIn: {
           '0%': { opacity: '0' },
           '100%': {  opacity: '1' },
         },
         fadeOut: {
           '0%': { opacity: '1' },
           '100%': {  opacity: '0' },
         },
         shrink: {
           '0%': { maxHeight: '0'},
           '100%': { maxHeight: '100vh' }
         }
       },
       transitionDuration: {
         'hover' : '200ms',
         'text' : '200ms',
         '1000' : '1000ms'
       },
       boxShadow: {
         'nav': '0px 0px 10px rgba(0, 0, 0, 0.25)',
       }
     }
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
