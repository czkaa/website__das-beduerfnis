export default {
  methods: {
    formatDates(start, end) {
      let monthStart = new Date(start).toLocaleDateString('de-DE', { month: 'short'})
      let monthEnd = new Date(end).toLocaleDateString('de-DE', { month: 'short'})
      let dayStart = new Date(start).toLocaleDateString('de-DE', { day: 'numeric'})
      let dayEnd = new Date(end).toLocaleDateString('de-DE', { day: 'numeric'})
            // new Date(exhibition.start).toLocaleDateString('de-DE', options)}–<br>${new Date(exhibition.end).toLocaleDateString('de-DE', options)
      if (monthStart === monthEnd) {
        return `${dayStart}.&shy; – ${dayEnd}. ${monthStart}`
      } else {
        return `${dayStart}. ${monthStart}. – &shy;${dayEnd} ${monthEnd}`
      }
    },
    formatDate(date) {
      let month = new Date(date).toLocaleDateString('de-DE', { month: 'short'})
      let day = new Date(date).toLocaleDateString('de-DE', { day: 'numeric'})
      return `${day}. ${month}`

    }
  }
}
