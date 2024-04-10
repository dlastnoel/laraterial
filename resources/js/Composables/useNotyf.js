import { Notyf } from 'notyf';

const notyf = new Notyf({
  duration: 3000,
  position: {
    x: 'right',
    y: 'bottom',
  },
  types: [
    {
      type: 'error',
      background: '#E57373',
      dismissible: false,
      icon: {
        className: 'mdi mdi-alert-circle-outline text-white'
      }
    },
    {
      type: 'info',
      background: '#1976D2',
      dismissible: false,
      icon: {
        className: 'mdi mdi-information-variant text-white',
        tagName: 'i',
      }
    }
  ]
})

export default {
  toast: (message, type = 'info') => {
    notyf.open({
      type: type,
      message: message
    })
  },
}