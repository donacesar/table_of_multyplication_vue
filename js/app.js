Vue.createApp({
  data: () => ({
    positive: 0,
    negative: 0,
    message: "&nbsp",
    x: 0,
    y: 0,
    question: "2 * 2 =",
    inputValue: "",
  }),
  methods: {
    task() {
      this.x = Math.floor(Math.random() * 11);
      this.y = Math.floor(Math.random() * 11);
      this.question = this.x + " * " + this.y + " =";
    },
    check() {
      if (this.inputValue === "") {
        return;
      }

      if (this.x * this.y === Number(this.inputValue)) {
        if (this.message === "Правильно") {
          this.message = this.message + "&nbsp";
        } else {
          this.message = "Правильно";
        }
        this.inputValue = "";
        this.task();
        this.positive++;
      } else {
        if (this.message === "Не правильно! Ответ:" + this.x * this.y) {
          this.message = this.message + "&nbsp";
        } else {
          this.message = "Не правильно! Ответ:" + this.x * this.y;
        }
        this.negative++;
        this.inputValue = "";
      }
    },
    reset() {
      this.positive = 0;
      this.negative = 0;
      this.message = "&nbsp";
      this.inputValue = "";
      this.task();
    },
    inputChangeHandler(event) {
      this.inputValue = event.target.value;
    },
  },
  beforeMount() {
    this.task();
  },
}).mount("#app");
