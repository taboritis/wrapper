#!/usr/bin/osascript

on run argv
    set argList to {}
    repeat with arg in argv
        display notification "All tests passed" with title "✅ on branch " & arg
    end repeat
end run

