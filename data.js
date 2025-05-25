const path = require("path");
const data = {
    workspaceDir: path.join(__dirname),
    layouts_dir: path.join(__dirname, "views", "layouts"),
    server: {
        /**
         * @type {number}
         */
        port: process.env.PORT,
        dbhost: process.env.DBHOST,
        dbuser: process.env.DBUSER,
        dbpassword: process.env.DBPSWRD,
        db: process.env.DB
    }
}
module.exports = data;