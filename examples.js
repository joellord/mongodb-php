// Speakers
[
  {
    _id: 1,
    name: "Joel Lord",
    bio: "Joel Lord is a developer advocate at MongoDB…"
  }
]

// Socials
[
  {
    _id: 1,
    speaker_id: 1,
    social: "Twitter",
    link: "https://twitter.com/joel__lord"
  },
  {
    _id: 2,
    speaker_id: 1,
    social: "Github",
    link: "https://github.com/joellord"
  }
]

// Talks
[
  {
    _id: 1,
    speaker_id: 1,
    conference_id: 1,
    title: "MongoDB and PHP: A Perfect Match",
    day: "June 1, 2022",
    time: "14:15"
  }
]

// Speaker with embedded socials
[
  {
    _id: 1,
    name: "Joel Lord",
    bio: "Joel Lord is a developer advocate at MongoDB…",
    socials: [
      {
        social: "Twitter",
        link: "https://twitter.com/joel__lord"
      },
      {
        social: "Github",
        link: "https://github.com/joellord"
      }
    ]
  }
]

// Speaker with even shorter socials object
[
  {
    _id: 1,
    name: "Joel Lord",
    bio: "Joel Lord is a developer advocate at MongoDB…",
    socials: {
      Twitter: "https://twitter.com/joel__lord",
      Github: "https://github.com/joellord"
    }
  }
]
