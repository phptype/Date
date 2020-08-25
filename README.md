Template
========

Template for creating new ScriptFUSION projects.

Usage
-----

1. `git clone git@github.com:ScriptFUSION/Template.git MYPROJ` &ndash; Clone this repository as *MYPROJ*.
2. `rm -rf .git` &ndash; Delete the VCS data.
3. `git init` &ndash; Start a new VCS repository.
4. `(shopt -s dotglob; for file in *.dist; do mv "$file" "${file%.*}"; done)` &ndash; Rename `*.dist` files, removing the *.dist* extension.
5. Replace placeholders in `composer.json`.
6. Create a hosted repository for the project on a VCS service like GitHub. Configure the local repository according to the instructions provided by the service.
7. Generate a new readme with `bin/generate\ readme\ template <repository url>` or edit manually.
8. `rm -rf bin` &ndash; Remove *bin* directory.
8. `git add . && git commit -m 'Initial commit.'` &ndash; Commit changes.
9. `git push` &ndash; Upload changes.
